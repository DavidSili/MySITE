<?php
$sitepos="blog";
$type=1;
if (isset($_GET['tag'])) {
    $tag=$_GET['tag'];
    $type=2;
}
else $tag="";
if (isset($_GET['year'])) {
    $year=$_GET['year'];
    $type=3;
}
else $year="";
if (isset($_GET['article'])) {
    $article=$_GET['article'];
    $type=4;
}
$page= isset($_GET['page']) ? $_GET['page'] : 1;

class loadArticle {
    private $stmt;
    public $result;
    public $gtime;

    function __construct($lang,$db)
    {
        $this->stmt=$db->prepare('SELECT
        ID,
          title_' . $lang . ' title,
          text_' . $lang . ' text,
          time,
          tags
        FROM
          blog
        WHERE ID = :ID');

    }
    function get_article ($article) {
    if ($this->stmt->execute(array(':ID'=>$article))) $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
        else $row = "";
        return $this->result=$row;
    }

    function sortTime () {
        $this->gtime = date('G:i d.m.Y.', strtotime($this->result['time']));
        return $this->gtime;
    }

}

class loadRange {
    private $stmt;
    public $result;
    public $gtime;
    private $row;
    private $sql;
    private $limit;
    private $lang;
    private $db;
    private $type;
    private $tag;
    private $year;
    private $page;

    function limit ($page) {
        if ($page==1) $this->limit=' LIMIT 5';
        else {
            $xpage=$page-1;
            $limited=$xpage*5-1;
            $this->limit=' LIMIT '.$limited.',5';
        }
        return $this->limit;
    }

    function __construct($lang,$db,$type,$tag,$year,$page)
    {
        $this->lang=$lang;
        $this->db=$db;
        $this->type=$type;
        $this->tag=$tag;
        $this->year=$year;
        $this->page=$page;
    }

    function sortTime ($time) {
        $this->gtime = date('G:i d.m.Y.', strtotime($time));
        return $this->gtime;
    }

    function get_range () {
        /* case: 1 - starting page of the blog
        *        2 - blog by tags
        *        3 - blog by years (archive)
        */
        switch ($this->type) {
            case 1:
                $this->sql = 'SELECT
    ID,
      title_' . $this->lang . ' title,
      text_' . $this->lang . ' text,
      time,
      tags
    FROM
      blog
    ORDER BY
      time DESC';
                $this->sql.=$this->limit($this->page);
                $this->stmt=$this->db->query($this->sql);
                if ($this->stmt) {
                    $this->stmt->execute();
                    $this->row = $this->stmt->fetchAll();
                }
                break;
            case 2:
                $this->sql = 'SELECT
    ID,
      title_' . $this->lang . ' title,
      text_' . $this->lang . ' text,
      time,
      tags
    FROM
      blog
    WHERE tags LIKE :tag
    ORDER BY
      time DESC';
                $this->sql.=$this->limit($this->page);
                $prep = $this->db->prepare($this->sql);
                if ($prep->execute(array(':tag' => '%'.$this->tag.'%'))) $this->row = $prep->fetchAll();
                break;
            case 3:
                $this->sql = 'SELECT
    ID,
      title_' . $this->lang . ' title,
      text_' . $this->lang . ' text,
      time,
      tags
    FROM
      blog
    WHERE YEAR(`time`) = :year
    ORDER BY
      time DESC';
                $this->sql.=$this->limit($this->page);
                $prep = $this->db->prepare($this->sql);
                if ($prep->execute(array(':year' => $this->year))) $this->row = $prep->fetchAll();
                break;
        }
        return $this->row;
    }

}


class showYears {
    private $stmt;
    private $lang;
    private $years = array();
    public $formatedText="";

    function __construct($language)
    {
        return $this->lang=$language;
    }

    public function get_years ($db) {
        $this->stmt=$db->query('SELECT
          YEAR(`time`) year
        FROM
          blog
        GROUP BY YEAR(`time`)');

        if ($this->stmt) {
            $this->stmt->execute();
            $data=$this->stmt->fetchAll();
            foreach ($data as $row) {
                $this->years[] = ($row['year']);
            }
        }
        return $this->years;
    }

    public function prepare_years ($db) {
        $this->years= $this->get_years ($db);
        foreach ($this->years as $year) {
            $this->formatedText.='<a href="blog/'.$this->lang.'/year/'.$year.'">'.$year.'</a>';
        }
        return $this->formatedText;
    }

}

class showTags {
    private $stmtmax;
    private $stmt;
    private $lang;
    public $tags = array();
    private $max;
    public $formatedText="";

    function __construct($language)
    {
        return $this->lang=$language;
    }

    public function get_maxUsage ($db)
    {
        $this->stmtmax = $db->query('SELECT
          MAX(used) maxused
        FROM
          blogtags');
        if ($this->stmtmax) {
            $this->stmtmax->execute();
            $rowmax = $this->stmtmax->fetch(PDO::FETCH_ASSOC);
            return $rowmax['maxused'];
        }
    }

    public function get_tags ($db)
    {
        $this->stmt = $db->query('SELECT
          name,
          fname,
          used
        FROM
          blogtags');

        if ($this->stmt) {
            $this->stmt->execute();
            $data = $this->stmt->fetchAll();
            foreach ($data as $row) {
                $name=$row['name'];
                $fname=$row['fname'];
                $used=$row['used'];
                $this->tags[] = array($name,$fname,$used);
            }
        }
        return $this->tags;
    }

    public function prepare_tags ($db) {
        $this->max = $this->get_maxUsage($db);
        $tags = $this->get_tags($db);
        foreach ($tags as $tag) {
            $fontsize=7+($tag[2]/$this->max*5);
            $this->formatedText.='<a href="blog/'.$this->lang.'/tag/'.$tag[1].'" style="font-size:'.$fontsize.'pt" title="'.$tag[2].'">'.$tag[0].'</a>';
        }
        return $this->formatedText;
    }

}

class showOthers {
    private $stmt;
    public $data;
    private $lang;
    public $formatedText="";

    function __construct($language)
    {
        return $this->lang=$language;
    }

    public function get_others ($db) {
        $this->stmt=$db->query('SELECT
        ID,
          title_' . $this->lang . ' title,
          summary_' . $this->lang . ' summary,
          time
        FROM
          blog
');

        if ($this->stmt) {
            $this->stmt->execute();
            $this->data=$this->stmt->fetchAll();
        }
        return $this->data;
    }

    public function prepare_others ($db) {
        $data= $this->get_others ($db);
        foreach ($data as $row) {
            $sortedTime = date('G:i d.m.Y.', strtotime($row['time']));
            $this->formatedText.='<a href="blog/'.$this->lang.'/'.$row['ID'].'" class="otherContainer"><h1>'.$row['title'].'</h1><div class="otherSummary">'.$row['summary'].'</div><div class="otherTime">'.$sortedTime.'</div></a>';
        }
        return $this->formatedText;
    }

}

class pageSelector {
    private $lang;
    private $type;
    private $page;
    private $year;
    private $tag;
    private $stmt;

    function __construct($lang,$type,$page,$year,$tag)
    {
        $this->lang=$lang;
        $this->type=$type;
        $this->page=$page;
        $this->year=$year;
        $this->tag=$tag;
    }
    function get_pageSel ($db) {
        $link="";
        $row="";
        switch ($this->type) {
            case 1:
                $this->stmt = $db->prepare('SELECT
                  COUNT(`ID`) cnt
                FROM
                  blog');
                if ($this->stmt->execute()) $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
                else $row = "";
                $link = 'blog/'.$this->lang;
                break;
            case 2:
                $this->stmt = $db->prepare('SELECT
                  COUNT(`ID`) cnt
                FROM
                  blog
                WHERE `tags` LIKE :tag');
                if ($this->stmt->execute(array(':tag' => '%'.$this->tag.'%'))) $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
                else $row = "";
                $link = 'blog/'.$this->lang .'/tag/'.$this->tag;
                break;
            case 3:
                $this->stmt = $db->prepare('SELECT
                  COUNT(`ID`) cnt
                FROM
                  blog
                WHERE YEAR(`time`) = :year');
                if ($this->stmt->execute(array(':year' => $this->year))) $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
                else $row = "";
                $link = 'blog/' . $this->lang . '/year/' . $this->year;
                break;
            }
        $pages=ceil($row['cnt']/5);
        if ($pages>1) {
            $selectPages='<section id="pageSelector">';
            if ($pages>7) {
                if ($this->page>5) $selectPages.='<a href="'.$link.'&page=1"><<</a> ...';
                    for ($i=1; $i <= $pages ; $i++) {
                        if (($i>($this->page-4) && $i<($this->page+4)) || $this->page==5 || ($pages-$this->page)==4) {
                            $selectPages.='<a href="'.$link.'&page='.$i.'"';
                            if ($this->page==$i) $selectPages.=' class="thisPage"';
                            $selectPages.='>'.$i.'</a>';
                        }
                    }
                if ($pages-$this->page>4) $selectPages.='... <a href="'.$link.'&page='.$pages.'">>></a>';
            } else {
                for ($i=1; $i <= $pages ; $i++) {
                    if ($this->page==$i) $selectPages.='<a class="thisPage">'.$i.'</a>';
                    else $selectPages.='<a href="'.$link.'&page='.$i.'">'.$i.'</a>';
                }
            }
            $selectPages.='</section>';
        } else $selectPages="";
        return $selectPages;
    }
}
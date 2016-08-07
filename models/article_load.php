<?php
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
        WHERE ID = ?');

    }
    function get_article ($article) {
    if ($this->stmt->execute(array($article))) $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
        else $row = "";
        return $this->result=$row;
    }

    function sortTime () {
        $this->gtime = date('G:i d.m.Y.', strtotime($this->result['time']));
        return $this->gtime;
    }

}
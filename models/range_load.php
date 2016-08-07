<?php
    class loadRange {
    private $stmt;
    public $result;
    public $gtime;
    private $row;
    public $query;

    function __construct($lang,$db)
    {
        $this->stmt=$db->query('SELECT
        ID,
          title_' . $lang . ' title,
          text_' . $lang . ' text,
          time,
          tags
        FROM
          blog
        LIMIT 3');
        return $this->stmt;
    }
    function get_range () {
        if ($this->stmt) {
            $this->stmt->execute();
            $this->row=$this->stmt->fetchAll();
        }
        return $this->row;
    }

    function sortTime ($time) {
        $this->gtime = date('G:i d.m.Y.', strtotime($time));
        return $this->gtime;
    }

}
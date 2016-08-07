<?php
    class loadRange {
    private $stmt;
    public $result;
    public $gtime;
    private $row;

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

    }
    function get_range () {
    if ($this->stmt) $this->row=$this->stmt->fetch(PDO::FETCH_ASSOC);
        return $this->result=$this->row;
    }

    function sortTime ($time) {
        $this->gtime = date('G:i d.m.Y.', strtotime($time));
        return $this->gtime;
    }

}
<?php

require_once(__DIR__.'./article.php');

class ArticleList
{
    private $list; 
    private $size;
    
    public function __construct()
    {
        $this->list = array();
        $this->size = 0;
    }

    public function add(Article $a)
    {
        $this->list[] = $a;
        $this->size += 1;;
    }

    public function show()
    {
        $i = 0;
        while($i < $this->size)
        {
            $this->list[$i]->displayInfo();
            $i += 1;
            echo "<br>";
        }
    }

    public function getArticle($num)
    {
        return $this->list[$num];
    }

    /**
     * Get the value of list
     */ 
    public function getList()
    {
        return $this->list;
    }

    public function getSize()
    {
        return $this->size;
    }
}
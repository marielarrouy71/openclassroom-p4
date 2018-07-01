<?php

class Comment
{
     private $id;
    private $title;
    private $content;
    private $creationDate;
    
    
    public function __construct($id, $title, $content, $creationDate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->creationDate = $creationDate;
    }

    
      public function getId()
    {
        return $this->id;
    }
    
     public function setId($id)
    {
        $this->id = $id;
    }
    
     public function getTitle()
    {
        return $this->title;
    }
    
     public function setTitle($title)
    {
        $this->title = $title;
    }
    
     public function getContent()
    {
        return $this->content;
    }
    
     public function setContent($content)
    {
        $this->content = $content;
    }
    
     public function getCreationDate()
    {
        return $this->creationDate;
    }
    
      public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }
    
}

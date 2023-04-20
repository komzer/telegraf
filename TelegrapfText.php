<?php

class TelegrapfText {
    public  $title, $text, $author, $publish, $slug;
    function __construct($author , $slug )
    {
        $this -> author = $author;
        $this -> slug = $slug;
        $this -> publishdate =('Y-m-d H:i:s');
    }

    public function storeText($text, $title){
        $arrayTelegrapf['text']= $this -> text =$text ;
        $arrayTelegrapf['title']= $this -> title =$title;
        $arrayTelegrapf['author']= $this -> author ;
        $arrayTelegrapf['published']= $this -> published ;
        $seria = serialize($arrayTelegrapf);
        if ( file_exists($this->slug)){
            $current = file_get_contents($this->slug);
            $current .= $arrayTelegrapf;
            file_put_contents($this->slug, $current);
        } else{
            file_put_contents($this->slug, $arrayTelegrapf);
        }
    }

}
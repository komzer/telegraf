<?php

class TelegrapfText {
    public  $title, $text, $author, $publish, $slug;
    function __construct($author , $slug )
    {
        $this -> author = $author;
        $this -> slug = $slug;
        $this -> publishdate = date('d.m.y - h:i:s');
    }

    public function storeText($text, $title){
        
        $arrayTelegrapf['text']= $this -> text = $text ;
        $arrayTelegrapf['title']= $this -> title = $title;
        $arrayTelegrapf['author']= $this->author ;
        $arrayTelegrapf['published']= $this -> published = date('d.m.y - h:i:s') ;
        $seria = serialize($arrayTelegrapf);
        if ( file_exists($this->slug)){
           // $current = file_get_contents($this->slug);
           // $current .= $arrayTelegrapf;
            file_put_contents($this->slug,  $seria,  FILE_APPEND);
        } else{
            file_put_contents($this->slug, $seria);
        }
    }

    public function loadText( $slug ){
        if ( file_exists($slug)){
            $current = file_get_contents($this->slug);
            $current = unserialize($current); 
            $this -> text = $current['text'];
            $this -> title = $current['title'];
            $this -> author = $current['author'];
            $this -> published = $current['published']; 
            return ($this -> text);
        }else{
            echo 'нет такоего файла';
        }
    }
    public function editText($title,$text){
        $this -> text = $text ;
        $this -> title = $title;
    }
}

$d = new TelegrapfText('kod','vot.txt');

$d -> storeText('chi-chi', 'ga-ga');
$d -> loadText( 'vot');
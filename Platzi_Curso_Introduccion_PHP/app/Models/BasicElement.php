<?php
namespace App\Models;

class BasicElement implements Printable{
    private $title;
    public $description;
    public $visible;
    public $months;
    public function __construct($title,$description/*,$visible,$months*/)
    {
        $this->setTitle($title);
        $this->setDescription($description);
        // $this->setVisible($visible);
        // $this->setMonths($months)   ;
    }
    public function setTitle($title)
    {
        $this->title=$title;//recordar que las propiedades de un objeto  no llevan el signo de dolar al usarlas
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setDescription($description)
    {
        $this->description=$description;//recordar que las propiedades de un objeto  no llevan el signo de dolar al usarlas
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setVisible($visible){
        $this->visible=$visible;
    }    
    public function getVisible()
    {
        return $this->visible;
    }
    public function setMonths($months)
    {
        $this->months=$months;
    }
    public function getMonths()
    {
        return  $this->months;
    }
}
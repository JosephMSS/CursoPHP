<?php
namespace App\Controllers;
class BaseController{
    protected $templateEngine;
    public function __construct(){
        $loader = new \Twig\Loader\FilesystemLoader('../views');
        $this->tempalteEngine = new \Twig\Environment($loader, [
            'debug'=>true,
            'cache' => false,

        ]);
    }

    public function renderHTMl($fileName,$data=[]){
        return $this->tempalteEngine->render($fileName,$data);
    }
}
?>
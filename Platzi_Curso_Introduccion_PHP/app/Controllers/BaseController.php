<?php
class BaseController{
    protected $templateEngine;
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('/path/to/templates');
        $this->tempalteEngine = new \Twig\Environment($loader, [
            'debug'=>true,
            'cache' => false,

        ]);
            }
            public function renderHTMl($fileName,$data=[])
            {
                return $this->tempalteEngine->render($fileName,$data);
            }
}
?>
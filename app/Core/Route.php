<?php

class Route{

    //defaults
    protected $controller   =   'home';
    protected $method       =   'index';
    protected $param        =   [];

    public function __construct()
    {
        if (isset($_GET['url'])) {
            $url = explode('/', filter_var(trim(rtrim($_GET['url'], '/')), FILTER_SANITIZE_URL));
            
            $url[0] = $url[0] . 'Controller.php';
            $filename = '../app/controllers/' . $url[0];
            //die($filename);
            if (file_exists($filename)) {
                $this->controller = $url[0];
            } else {
                die("404");
            }
            
            require_once 'app/Controllers/HomeController.php';

            
        }
    }
}
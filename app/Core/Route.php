<?php

class Route{

    //defaults
    protected $controller   =   'HomeController';
    protected $method       =   'index';
    protected $params        =   [];

    public function __construct()
    {
        if (isset($_GET['url'])) {
            $url = explode('/', filter_var(trim(rtrim($_GET['url'], '/')), FILTER_SANITIZE_URL));
            
            //manipulating a url
            $url[0] = ucfirst(strtolower($url[0])) . 'Controller';
            
            //look for the controller
            if ( file_exists('app/Controllers/' . $url[0] . '.php') ) {
                $this->controller = $url[0];
                //die('sini');
            } else {
                die("404");
            }
            
            require_once 'app/Controllers/'.$this->controller. '.php';
            $this->controller = new $this->controller;

            //look for the method written in a url 
            if (isset($url[1])) {
                if ( method_exists($this->controller, $url[1]) ) {
                    $this->method = $url[1];
                }else{
                    die('404, metode ora ono!');
                }
            }

            //defined a paramater
            //menghapus nilai sebelumnya
            unset($url[0], $url[1]);
            if ( !isset( $url ) ) {
                die('the method need a parameter!');
            }
            $this->params = $url;
            call_user_func_array([$this->controller, $this->method], $this->params);
            
        }
    }
}
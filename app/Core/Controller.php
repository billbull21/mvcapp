<?php

class Controller{

    protected function view($file, $data = [])
    {
        require_once 'app/Views/'.$file.'.view.php';
        return $this;
    }

    protected function model($file)
    {
        require_once 'app/Models/'.$file.'.php';
        return new $file;
    }

}
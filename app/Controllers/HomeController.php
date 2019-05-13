<?php

class HomeController extends Controller{

    public function index()
    {
        return $this->view('home');
    }

    public function test($umur)
    {
        $this->model('User');
        $this->view('test', [ 'nama' =>  User::$name, 'umur' => $umur]);
    }

}

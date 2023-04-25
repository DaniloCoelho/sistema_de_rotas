<?php
namespace app\controllers;
class HomeController
{
    public function index(){
       return Controller::view('home');
    }
    public function ir(){
        echo "Indo";
    }

}

?>
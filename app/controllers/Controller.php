<?php

namespace app\controllers;

//uma classe abstrata , pq vou usa-la somente para outras classes extende-la
use League\Plates\Engine;



class Controller{
    //parametros a view e os dados que vou passar para meu template
    public static function view(string $view ,array $data = []){
        $viewsPath = dirname(__FILE__, 2).'/views';

        if(!file_exists($viewsPath.DIRECTORY_SEPARATOR.$view . ".php")){
            throw new \Exception("A view {$view} não existe");
        }

        $templates = new Engine($viewsPath);
        echo $templates->render($view, $data);

    }
}

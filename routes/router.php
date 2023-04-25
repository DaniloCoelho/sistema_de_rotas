<?php


//função de carregamento das rotas ,vai esperar o controller e o metodo do controler
function load(string $controller, string $action)
{
    try {
        // se controller existe
        $controllerNamespace = "app\\controllers\\{$controller}";

        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe");
        }

        //se existir atribui $controllerNamespace() a uma variavel 
        $controllerInstance = new $controllerNamespace();

        //verifica se o metodo existe na variavel $controllerInstance
        if (!method_exists($controllerInstance, $action)) {
            throw new Exception(
                "O método {$action} não existe no controller {$controller}"
            );
        }
        //se existir o metodo dessa chama o metodo
        $controllerInstance->$action((object) $_REQUEST);
        var_dump($_SERVER);
        var_dump($controller);
        var_dump($action);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

//array com tipo de requisição , controller e metodo do controller , é usado arrow function (fn () ), pois mesmo não chamando $router em lugar nenhum a função seria executada oq é um risco

$router = [
  "GET" => [
    "/" => fn() => load("HomeController", "index"),
    "/contact" => fn() => load("ContactController", "index"),
  ],
  "POST" => [
    "/contact" => fn() => load("ContactController", "store"),
  ],
];
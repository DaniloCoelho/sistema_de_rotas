<?php
// https://www.youtube.com/watch?v=h7K-KUZ3Rvw&t=1970s       29:20
require "../vendor/autoload.php";
require "../routes/router.php";
try {
    //parse_url exemplo localhost:8000/products?=name= geladeira , vai retornar ira retornar path=>'product , 'query' => 'name=geladeira'
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    
    //retorna GET ou POST  
    $request = $_SERVER['REQUEST_METHOD'];
    
    //verifica se a requisição $request existe na $router
    if (!isset($router[$request])){
        //echo "a rota não existe";
        //throw new Exception("a rota não existe");
    }

    //verifica se uri existe no array de rotas , é como se perguntasse se existe 'products' na $router['GET]
    if (!array_key_exists($uri , $router[$request])){
        //echo "a rota não existe";
        //throw new Exception("a rota não existe");
    }

    //agora chama a rota
    
    $controller = $router[$request][$uri];
    $controller();
    
    
    /*
    var_dump($router);
    var_dump($uri);
    var_dump($_SERVER);
    print_r($_SERVER['REQUEST_URI']);
    var_dump($request);
    var_dump($uri);
    var_dump($_SERVER);
    var_dump($request);
    */
    
} catch (Exception $e) {
    $e->getMessage();
}

?>
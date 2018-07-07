<?php

include 'App//controller//homeController.php';
$route = new Route;

class Route {
    //put your code here
    private $routes;
    
    public function __construct() {
        $this->initRoutes();
        $this->run($this->getURL());
    }
    
    public function initRoutes(){
        $this->routes['/CursoPhp/'] = array ('controller' => 'homeController', 'action' => 'index');
        $this->routes['/CursoPhp/lista'] = array ('controller' => 'homeController', 'action' => 'lista');
        $this->routes['/CursoPhp/conteudo'] = array ('controller' => 'homeController', 'action' => 'conteudo');
    }
    
    protected function run($url){
        if (array_key_exists($url, $this->routes)){
            $class = "\\App\\controller\\" . $this->routes[$url]['controller'];
            $controller = new $class;
            $action = $this->routes[$url]['action'];
            $controller->$action();
        }
    }
    
    public function getURL(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
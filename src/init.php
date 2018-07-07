<?php
include 'App//controller//homeController.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$route = new Route;
/**
 * Description of Route
 *
 * @author alfamidia
 */
class Route {
    //put your code here
    private $routes;
    
    public function __construct() {
        $this->initRoutes();
        $this->run($this->getURL());
    }
    
    public function initRoutes(){
        $this->routes['/'] = array ('controller' => 'homeController', 'action' => 'index');
        $this->routes['/lista'] = array ('controller' => 'homeController', 'action' => 'lista');
        $this->routes['/conteudo'] = array ('controller' => 'homeController', 'action' => 'conteudo');
        $this->routes['/editar'] = array ('controller' => 'homeController', 'action' => 'editar');
        $this->routes['/incluir'] = array ('controller' => 'homeController', 'action' => 'incluir');
        $this->routes['/remover'] = array ('controller' => 'homeController', 'action' => 'remover');
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
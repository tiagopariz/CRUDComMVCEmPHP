<?php

namespace App\Controller;

class homeController {
    
    protected $view;
    
    public function render($view, $template) {
        $this->view = 'App//view//home//'.$view;
        include 'App//view//'.$template;
    }
    
    public function content() {
        include $this->view;
    }
    
    public function index() {
        $this->render('index.php','template.php');
    }  
    
    public function lista() {
        $this->render('lista.php','template.php');
    }
    
    public function conteudo() {
        $this->render('conteudo.php','template.php');
    }
}

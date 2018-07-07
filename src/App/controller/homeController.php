<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
  
include 'App//model//produtos.php';
/**
 * Description of homeController
 *
 * @author alfamidia
 */
class homeController {
    
    protected $view;
    public $produtos;
    public $detalhe_produto;
    
    //put your code here
    public function index() {
        $this->render('index.php','template.php');
    }
    
    public function lista() {
        $modelProdutos = new \App\model\produtos();
        $this->produtos = $modelProdutos->RetornaProdutos();
        $this->render('lista.php','template.php');
    }
    
    public function conteudo() {
        $modelProdutos = new \App\model\produtos();
        $this->detalhe_produto = $modelProdutos->LerDetalheProduto($_GET['idProduto']);
        $this->render('conteudo.php','template.php');
    }
    public function remover() {
        $modelProdutos = new \App\model\produtos();
        $modelProdutos->RemoverProduto($_GET['idProduto']);
        $this->render('remover.php','template.php');
    }
    
    public function incluir() {
        $modelProdutos = new \App\model\produtos();
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $idGerado = $modelProdutos->IncluirProdutos($_POST['nome'],$_POST['descricao']);
            $this->detalhe_produto = $modelProdutos->LerDetalheProduto($idGerado);
            $this->mensagem = "Produto incluido";
            $this->render('editado.php','template.php');
            return;
        }
        $this->render('incluir.php','template.php');

    }
    
    
    public function editar() {
        $modelProdutos = new \App\model\produtos();
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $modelProdutos->AtualizarProdutos($_GET['idProduto'],$_POST['nome'],$_POST['descricao']);
            $this->detalhe_produto = $modelProdutos->LerDetalheProduto($_GET['idProduto']);
            $this->mensagem = "Produto atualizado";
            $this->render('editado.php','template.php');
            return;
        }
        $this->detalhe_produto = $modelProdutos->LerDetalheProduto($_GET['idProduto']);
        $this->render('editar.php','template.php');

    }
    
    
    public function content() {
        include $this->view;
    }
    
    public function render($view, $template) {
        $this->view = 'App//view//home//' . $view;
        include 'App//view//' . $template;
    }
    
}
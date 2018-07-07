<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\model;

/**
 * Description of produtos
 *
 * @author alfamidia
 */
class produtos {
    private $produtos;
    private $detalhe_produto;
    private $PDO;
    private $ultimo_erro;
    
    public function Conexao() {
        try {
           $this->PDO = new \PDO("mysql:host=localhost;dbname=projeto","root");
        } 
        catch (\PDOException $exc) {
            $this->ultimo_erro = "erro na conexão<br>";
            return false;
        }
        return true;
    }

    public function LerProdutos() {
        
        if (!$this->Conexao()){
            echo "Erro de conexão<BR>";
            echo $this->ultimo_erro;
            return;
        }
        
        $sql = "SELECT idProduto, nome FROM produtos";
        $i = 0;
        foreach($this->PDO->query($sql) as $row){
            $this->produtos[$i]['nome'] = $row['nome'];
            $this->produtos[$i]['idProduto'] = $row['idProduto'];
            $i++;
            
        }
    }
    
    public function RemoverProduto($idProduto) {
        try {
           $PDO = new \PDO("mysql:host=localhost;dbname=projeto","root");
        } catch (\PDOException $exc) {
            echo "erro na conexão<br>";
            echo $exc->getMessage();
            return;
        }
        
        $sql = "DELETE FROM produtos WHERE idProduto= ?";
        $retorno = $PDO->prepare($sql);
        $retorno->bindParam(1,$idProduto);
        $retorno->execute();
        
    }
    
    
    public function LerDetalheProduto($idProduto) {
        try {
           $PDO = new \PDO("mysql:host=localhost;dbname=projeto","root");
        } catch (\PDOException $exc) {
            echo "erro na conexão<br>";
            echo $exc->getMessage();
            return;
        }
        
        $sql = "SELECT nome, descricao FROM produtos WHERE idProduto= ?";
        $retorno = $PDO->prepare($sql);
        $retorno->bindParam(1,$idProduto);
        $retorno->execute();
        $resultado = $retorno->fetch();
        $this->detalhe_produto['nome'] = $resultado['nome'];
        $this->detalhe_produto['descricao'] = $resultado['descricao'];
        
        return $this->detalhe_produto;
        
    }
    
    public function AtualizarProdutos($idProduto, $nome, $descricao){
        if (!$this->Conexao()){
            echo "Erro de conexão<BR>";
            echo $this->ultimo_erro;
            return;
        }
        $retorno = $this->PDO->prepare('UPDATE produtos SET nome = :nome, descricao = :descricao WHERE idProduto = :id');
        $retorno->bindParam(':nome',$nome);
        $retorno->bindParam(':descricao',$descricao);
        $retorno->bindParam(':id',$idProduto);
        $retorno->execute();
    }

    public function IncluirProdutos($nome, $descricao){
        if (!$this->Conexao()){
            echo "Erro de conexão<BR>";
            echo $this->ultimo_erro;
            return;
        }
        $retorno = $this->PDO->prepare('INSERT INTO produtos (nome, descricao) values (:nome, :descricao)');
        $retorno->bindParam(':nome',$nome);
        $retorno->bindParam(':descricao',$descricao);
        $this->PDO->beginTransaction();
        $retorno->execute();
        $idGerado = $this->PDO->lastInsertId();
        $this->PDO->commit();
        return $idGerado;
    }

    
    public function RetornaProdutos() {
        $this->LerProdutos();
        return $this->produtos;
    }
}
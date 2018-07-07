<form method = post>
    Nome: <input name="nome" value="<?php echo $this->detalhe_produto['nome'];?>">
    <br>
    Descrição: <textarea name="descricao" rows="10" cols="40"><?php echo $this->detalhe_produto['descricao'];?></textarea>
    <br>
    <input type=submit>
    
</form>
        
<a href='/incluir'>Incluir Produto</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($this->produtos as $item) {
                echo '<tr>';
                echo '<th scope="row">'.$item['idProduto'].'</th>';
                echo '<td><a href="/editar?idProduto='.$item['idProduto'].'">'.$item['nome'].'</a></td>';
                echo '<td><a href="/excluir?idProduto='.$item['idProduto'].'">Excluir</a></td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>


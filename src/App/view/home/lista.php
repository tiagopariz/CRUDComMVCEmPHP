<a href='/incluir'>Incluir Produto</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($this->produtos as $item) {
                echo '<tr>';
                echo '<th scope="row">'.$item['idProduto'].'</th>';
                echo '<td>'.$item['nome'].'</td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>


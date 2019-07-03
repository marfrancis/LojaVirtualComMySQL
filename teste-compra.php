<?php

include 'conexao.php';

$compras = Compra::pesquisar();

?><pre><?php print_r([$compras]) ?></pre>
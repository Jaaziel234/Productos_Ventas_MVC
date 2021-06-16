<?php
$cont = 0;
$pagina = 0;
if (isset($_GET['num'])) {
    $pagina = $_GET['num'];
}
if (isset($_GET['n_reg']) || isset($_GET['num'])) {
    $registros = $_GET['num_reg'];
}
else {
    $registros = 3;
}

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
}
else {
    $inicio = ($pagina -1) * $registros;
}
$query = "SELECT * FROM productos";

if (isset($_GET['like'])) {
    $valor = $_GET['valor'];
    $queryCate= "SELECT * FROM productos WHERE nombre_producto LIKE '%$valor%'";

} else {
    $queryCate= "SELECT * FROM productos ORDER BY id_producto LIMIT $inicio, $registros";
}

$DataCategorias = SelectData($queryCate, "i");

$num_registros = NumReg($query);

$paginas = ceil($num_registros/$registros);
?>
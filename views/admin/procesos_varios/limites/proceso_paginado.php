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
$query = "SELECT * FROM limites_productos";

if (isset($_GET['like'])) {
    
    $valor = $_GET['valor'];
        $sqlpro = "SELECT * FROM productos WHERE nombre_producto LIKE '%$valor%'";
        $querypro = SelectData($sqlpro, "i");
        foreach($querypro as $dato){
            $data = $dato['id_producto'];
        }

        $queryCate= "SELECT limi.id_limite, inv.id_inventario, pro.nombre_producto, cat.categoria, limi.limite FROM inventarios AS inv, productos AS pro, categorias AS cat, limites_productos AS limi 
        WHERE inv.id_producto = pro.id_producto AND inv.id_categoria = cat.id_categoria AND limi.id_producto = pro.id_producto AND limi.id_producto = '$data'";

} else {
    $queryCate= "SELECT limi.id_limite, inv.id_inventario, pro.nombre_producto, cat.categoria, limi.limite FROM inventarios AS inv, productos AS pro, categorias AS cat, limites_productos AS limi 
    WHERE inv.id_producto = pro.id_producto AND inv.id_categoria = cat.id_categoria AND limi.id_producto = pro.id_producto ORDER BY limi.id_limite LIMIT $inicio, $registros";
}

$DataCategorias = SelectData($queryCate, "i");

$num_registros = NumReg($query);

$paginas = ceil($num_registros/$registros);
?>
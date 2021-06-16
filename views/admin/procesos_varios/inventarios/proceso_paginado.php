<?php
    $con = 0;
    $pagina = 0;
    
    if (isset($_GET['num']))
    {
        $pagina = $_GET['num'];
    }
    if (isset($_GET['n_reg']) || isset($_GET['num']))
    {
        $registros = $_GET['num_reg'];
    }
    else{
        $registros = 3; 
    }
    if (!$pagina)
    {
        $inicio = 0;
        $pagina = 1;
    }
    else {
        
        $inicio = ($pagina -1)* $registros;
    }

    $query = "SELECT * FROM inventarios";
    if(isset($_GET['like']))
    {
        $valor = $_GET['valor'];
        $sqlpro = "SELECT * FROM productos WHERE nombre_producto LIKE '%$valor%'";
        $querypro = SelectData($sqlpro, "i");
        foreach($querypro as $dato){
            $data = $dato['id_producto'];
        }
        

        $queryCate = "SELECT inv.id_inventario, pro.nombre_producto, cat.categoria, inv.stock, inv.estado, pro.imagen FROM inventarios AS inv, productos AS pro, categorias AS cat 
        WHERE inv.id_producto = pro.id_producto AND inv.id_categoria = cat.id_categoria AND inv.id_producto = '$data'";

    }
    else 
    {
        $queryCate = "SELECT inv.id_inventario, pro.nombre_producto, cat.categoria, inv.stock, inv.estado, pro.imagen FROM inventarios AS inv, productos AS pro, categorias AS cat 
        WHERE inv.id_producto = pro.id_producto AND inv.id_categoria = cat.id_categoria ORDER BY inv.id_inventario LIMIT $inicio, $registros";
    }


    $Datainventarios = SelectData($queryCate,"i");

    $num_registro = NumReg($query);

    $paginas = ceil($num_registro/$registros);



?>
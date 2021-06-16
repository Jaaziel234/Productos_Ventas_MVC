<?php

session_start();
include "../../../../models/conexion.php";
include "../../../../models/procesos.php";
include "../../../../controllers/procesos.php";

if (isset($_GET['estado_inventario'])) {
    

    if ($_GET['estado'] == 1) {
        $estado = 0;
    } else {
        $estado = 1;
    }

    $id=$_GET['id'];
    
    $query = "UPDATE inventarios SET estado='$estado' WHERE id_inventario='$id'";
    $insertCategoria = UpdateInsertDeleteData($query);
    if ($insertCategoria == 1) {
        echo '<script>
        $(document).ready(function(event){
            alertify.alert("Actualizacion de estado", "Estado Actualizado");
            $("#contenido-procesos").load("procesos_varios/inventarios/principal_inventario.php");
            event.preventDefault();

        });
        </script>';
    }
} 
else {
    echo '<script>
        $(document).ready(funtion(event){
            alertify.alert("Registro Categoria", "Error al registar");
            $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
            event.preventDefault();

        });
        </script>';
}


?>
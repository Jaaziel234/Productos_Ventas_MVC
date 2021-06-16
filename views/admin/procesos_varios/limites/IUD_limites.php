<?php

session_start();
include "../../../../models/conexion.php";
include "../../../../models/procesos.php";
include "../../../../controllers/procesos.php";

if (isset($_GET['insert-limit'])) {
    $limite = $_GET['limite'];
    $producto = $_GET['producto'];
    $query = "INSERT INTO limites_productos(id_producto, limite) VALUES ('$producto', '$limite')";
    $insertCategoria = UpdateInsertDeleteData($query);
    if ($insertCategoria == 1) { 
        echo '<script>
        $(document).ready(function(event){
            alertify.alert("Registro Limite", "Limite Registrado");
            $("#contenido-procesos").load("procesos_varios/limites/principal_limites.php");
            event.preventDefault();

        }); 
        </script>';
    }
     
} 
elseif (isset($_GET['editlimit'])) {
    $limite = $_GET['limite'];
    $id = $_GET['id'];
    $query = "UPDATE limites_productos SET limite='$limite' WHERE id_limite='$id'";
    $insertCategoria = UpdateInsertDeleteData($query);
    if ($insertCategoria == 1) { 
        echo '<script>
        $(document).ready(function(event){
            alertify.alert("Editar Limite", "Limite actualizado");
            $("#contenido-procesos").load("procesos_varios/limites/principal_limites.php");
            event.preventDefault();

        }); 
        </script>';
    }
     
} 

elseif (isset($_GET['deletetlimit'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM limites_productos WHERE id_limite='$id'";
    $insertCategoria = UpdateInsertDeleteData($query);
    if ($insertCategoria == 1) { 
        echo '<script>
        $(document).ready(function(event){
            alertify.alert("Eliminar Limite", "Limite eliminado");
            $("#contenido-procesos").load("procesos_varios/limites/principal_limites.php");
            event.preventDefault();

        }); 
        </script>';
    }
     
}
else {
    echo '<script>
        $(document).ready(funtion(event){
            alertify.alert("Registro Categoria", "Error al registar");
            $("#contenido-procesos").load("procesos_varios/limites/principal_limites.php");
            event.preventDefault();

        });
        </script>';
} 







?>
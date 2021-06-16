<?php

session_start();
include "../../../../models/conexion.php";
include "../../../../models/procesos.php";
include "../../../../controllers/procesos.php";

if (isset($_POST['insert_cate'])) {
    $categoria = $_POST['categoria'];

    $imagenname = $_FILES['imagen']['name'];
    $imgdir = $_FILES['imagen']['tmp_name'];
    $imgsize = $_FILES['imagen']['size'];



    //direcciones
    $carpeta = "categorias/";
    $path = "../../../../public/img/".$carpeta;
    $imgext= strtolower(pathinfo($imagenname, PATHINFO_EXTENSION));
    $newname = $categoria.".".$imgext;

    $cargarimg = CargarIMG($imgdir, $imgsize, $newname, $path);
    switch ($cargarimg) {
        case 0:
            echo $imgdir;
            break;
        
        case 1:
            $img = $carpeta.$newname;
            
            $query = "INSERT INTO categorias(categoria, imagen_categoria, estado) VALUES ('$categoria', '$img', '1')";
            $insertCategoria = UpdateInsertDeleteData($query);
            if ($insertCategoria == 1) {
                echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Categoria", "Categoria Registrada");
                    $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                    event.preventDefault();

                });
                </script>';
            }
        break;
    }

} 



elseif (isset($_POST['edit_cate'])) { 
    $categoria = $_POST['categoria'];
    $id = $_POST['idcategoria'];

    $imagenname = $_FILES['imagen']['name'];
    $imgdir = $_FILES['imagen']['tmp_name'];
    $imgsize = $_FILES['imagen']['size'];
    
    
    
    
    $columnas = '';
    
    $querycate = "SELECT * FROM categorias WHERE id_categoria = '$id'";
    $datacat = SelectData($querycate, "i");
    foreach ($datacat AS $result){
        $infocat = $result['imagen_categoria'];
    }


    
    //direcciones
    $carpeta = "categorias/";
    $path = "../../../../public/img/".$carpeta;
    $old = "../../../../public/img/".$infocat;
    $imgext= strtolower(pathinfo($imagenname, PATHINFO_EXTENSION));
    $newname = $categoria.".".$imgext;

    $cargarimg = CargarIMGEDIT($imgdir, $imgsize, $newname, $path, $old);
    switch ($cargarimg) {
        case 0:
            echo $imgdir;
            break;
        
        case 1:
            $img = $carpeta.$newname;
            $query = "UPDATE categorias SET categoria='$categoria', imagen_categoria='$img' WHERE id_categoria='$id'";
            $insertCategoria = UpdateInsertDeleteData($query);
            if ($insertCategoria == 1) {
                echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Editar Categoria", "Categoria Actualizada");
                    $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                    event.preventDefault();
        
                });
                </script>';
            }
        break;
    }

    



   
} 




elseif (isset($_GET['estado_cat'])) {
    
    $id = $_GET['id'];
    if ($_GET['estado'] == 1) {
        $estado = 0;
    } else {
        $estado = 1;
    }

    $query = "UPDATE categorias SET estado='$estado' WHERE id_categoria='$id'";
    $insertCategoria = UpdateInsertDeleteData($query);
    if ($insertCategoria == 1) {
        echo '<script>
        $(document).ready(function(event){
            alertify.alert("Estado Categoria", "Estado Cambiado");
            $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
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
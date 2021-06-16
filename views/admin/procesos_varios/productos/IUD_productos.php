<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-productos.js"></script>

<?php

session_start();
include "../../../../models/conexion.php";
include "../../../../models/procesos.php";
include "../../../../controllers/procesos.php";

$id_producto = (isset($_POST['id_producto']))?$_POST['id_producto']: "";
$categoria = (isset($_POST['id_categoria']))?$_POST['id_categoria']: "";
$producto =  (isset($_POST['nombre_producto']))?$_POST['nombre_producto']: "";
$descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']: "";
$cantidad = (isset($_POST['cantidad']))?$_POST['cantidad']: "";//para inventarios
$unidad_medida = (isset($_POST['unidad_medida']))?$_POST['unidad_medida']: "";
$precio_compra = (isset($_POST['precio_compra']))?$_POST['precio_compra']: "";
$precio_venta = (isset($_POST['precio_venta']))?$_POST['precio_venta']: "";

//imagen
if (isset($_POST['insert_pro'])) {
    
$imagenname = $_FILES['imagen']['name'];
$imgdir = $_FILES['imagen']['tmp_name'];
$imgsize = $_FILES['imagen']['size'];




$columnas = '';

$querycate = "SELECT * FROM categorias WHERE id_categoria = '$categoria'";
$datacat = SelectData($querycate, "i");
foreach ($datacat AS $result){
    $infocat = $result['categoria'];
}

//direcciones
$carpeta = "productos/".$infocat."/";
$path = "../../../../public/img/".$carpeta;
$imgext= strtolower(pathinfo($imagenname, PATHINFO_EXTENSION));
$newname = $producto.".".$imgext;

$cargarimg = CargarIMG($imgdir, $imgsize, $newname, $path);


switch ($cargarimg) {
    case 0:
        echo '<script>
        $(document).ready(function(event){
            alertify.alert("Cargar imagenes", "Error en subir la imagen");
            $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
            event.preventDefault();

        });
        </script>';
        break;
    
    case 1:
        $img = $carpeta.$newname;
        $query = "INSERT INTO productos (id_producto, nombre_producto, descripcion, precio_compra, precio_venta, unidad_medida, imagen) 
        VALUES ('$id_producto', '$producto', '$descripcion', '$precio_compra', '$precio_venta', '$unidad_medida', '$img')";
        $insertproducto = UpdateInsertDeleteData($query);

        $queryinv = "INSERT INTO inventarios (id_producto, id_categoria, stock) VALUES ('$id_producto', '$categoria', '$cantidad')";

        $insertinvetarios = UpdateInsertDeleteData($queryinv);

        

        if ($insertproducto == 1 && $insertinvetarios ==1) {
            echo '<script>
            $(document).ready(function(event){
                alertify.success("Producto registrado");
                alertify.success("Inventario registrado");
                $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                event.preventDefault();

            });
            </script>';
        }
        else {
            echo '<script>
            $(document).ready(function(event){
                alertify.error("Error de registros");
                $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                event.preventDefault();

            });
            </script>';
        }
        break;
}
}

if (isset($_POST['edit_pro'])) {
    
    $imagenname = $_FILES['imagen']['name'];
    $imgdir = $_FILES['imagen']['tmp_name'];
    $imgsize = $_FILES['imagen']['size'];
    
    
    
    
    $columnas = '';
    
    $querycate = "SELECT * FROM categorias WHERE id_categoria = '$categoria'";
    $datacat = SelectData($querycate, "i");
    foreach ($datacat AS $result){
        $infocat = $result['categoria'];
    }

    $querypro = "SELECT * FROM productos WHERE id_producto = '$id_producto'";

    $datapro = SelectData($querypro, "i");
    foreach ($datapro AS $resulte){
        $infopro = $resulte['imagen'];
    }

    
    //direcciones
    $carpeta = "productos/".$infocat."/";
    $path = "../../../../public/img/".$carpeta;
    $old = "../../../../public/img/".$infopro;
    $imgext= strtolower(pathinfo($imagenname, PATHINFO_EXTENSION));
    $newname = $producto.".".$imgext;
    
    
    if ($imagenname) {

        $cargarimg = CargarIMGEDIT($imgdir, $imgsize, $newname, $path, $old);

        
        switch ($cargarimg) {
        case 0:
            echo '<script>
            $(document).ready(function(event){
                alertify.alert("Cargar imagenes edit", "Error en subir la imagen");
                $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                event.preventDefault();
    
            });
            </script>';
            break;
        
        case 1:
            $img = $carpeta.$newname;
            $query = "UPDATE productos SET nombre_producto='$producto', descripcion='$descripcion', precio_compra='$precio_compra', precio_venta='$precio_venta',
            unidad_medida='$unidad_medida', imagen='$img' WHERE id_producto='$id_producto'";
            $insertproducto = UpdateInsertDeleteData($query);
    
            $queryinv = "UPDATE inventarios SET id_categoria='$categoria', stock='$cantidad' WHERE id_producto='$id_producto'";
    
            $insertinvetarios = UpdateInsertDeleteData($queryinv);
    
            
    
            if ($insertproducto == 1 && $insertinvetarios ==1) {
                echo '<script>
                $(document).ready(function(event){
                    alertify.success("Producto actualizado");
                    alertify.success("Inventario actualizado");
                    $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                    event.preventDefault();
    
                });
                </script>';
            }
            else {
                echo '<script>
                $(document).ready(function(event){
                    alertify.error("Error de registros");
                    $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                    event.preventDefault();
    
                });
                </script>';
            }
            break;
    }
        
    } else {
            $query = "UPDATE productos SET nombre_producto='$producto', descripcion='$descripcion', precio_compra='$precio_compra', precio_venta='$precio_venta',
            unidad_medida='$unidad_medida' WHERE id_producto='$id_producto'";
            $insertproducto = UpdateInsertDeleteData($query);
    
            $queryinv = "UPDATE inventarios SET id_categoria='$categoria', stock='$cantidad' WHERE id_producto='$id_producto'";
    
            $insertinvetarios = UpdateInsertDeleteData($queryinv);
    
            
    
            if ($insertproducto == 1 && $insertinvetarios ==1) {
                echo '<script>
                $(document).ready(function(event){
                    alertify.success("Producto actualizado");
                    alertify.success("Inventario actualizado");
                    $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                    event.preventDefault();
    
                });
                </script>';
            }
            else {
                echo '<script>
                $(document).ready(function(event){
                    alertify.error("Error de registros");
                    $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                    event.preventDefault();
    
                });
                </script>';
            }
    }
}







if (isset($_GET['delete_pro'])) {
    $id = $_GET['id'];

    if ($_GET['estado'] == 1) {
        $estado = 0;
    } else {
        $estado = 1;
    }
     


    $query = "UPDATE productos SET estado='$estado' WHERE id_producto='$id'";
    $deletepro = UpdateInsertDeleteData($query);
    
    if ($deletepro == 1) {
        echo '<script>
        $(document).ready(function(event){
            alertify.alert("Estado", "Estado del productos cambiado");
            $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
            event.preventDefault();

        });
        </script>';
    }
} 
else {
    echo '<script>
        $(document).ready(funtion(event){
            alertify.alert("Eliminacion de producto", "Error al eliminar");
            $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
            event.preventDefault();

        });
        </script>';
}




/* if (isset($_GET['insert_cate'])) {
    $categoria = $_GET['categoria'];
    $query = "INSERT INTO categorias(categoria) VALUES ('$categoria')";
    $insertCategoria = UpdateInsertDeleteData($query);

} 
 */


?>
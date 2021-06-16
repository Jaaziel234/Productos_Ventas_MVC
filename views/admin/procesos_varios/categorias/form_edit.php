<script src="../../public/js/funciones-navbar.js"></script>

<script src="../../public/js/funciones-categorias.js"></script>


<?php

session_start();
include_once "../../../../models/conexion.php";
include_once "../../../../models/procesos.php";
include_once "../../../../controllers/procesos.php";

$id = $_GET['id'];

$query = "SELECT * FROM categorias WHERE id_categoria='$id'";
$datosCategoria = SelectData($query, "i");


//Seleccionar los ID de la tabla producto para insertar un nuevo registro


?>
<?php foreach ($datosCategoria as $resultcat): ?>
<div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-6">

        <h3 style="text-align: center;">Editar Categoría</h3>

        <hr>

        <div class="input-group mb-3">

            <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon1">Categoría</span>
                <form id="edit_catee" enctype="multipart/form-data">
            <input type="hidden" name="idcategoria" id="idcategoria"  value="<?php echo $id; ?>">

            <input type="text" name="categoria" id="categoria" class="form-control" value="<?php echo $resultcat['categoria']; ?>" placeholder="Nombre Categoría" required="on" autocomplete="off" />
            <input type="file" name="imagen" id="imagen">
            </form>

            </div>
            
        </div>
        <div>
            <p>Imagen actual</p>
                <img src="<?php 
                if ($resultcat['categoria']) {
                    echo '../../public/img/'.$resultcat['imagen_categoria']; 
                } else {
                    echo "";
                }
                
                
                ?>" width="200px" alt="">
            </div>

        <div>
        <img src="" width="200px" id="imagenmuestra" alt="">
        </div>
        <div>


            <a class="btn btn-primary text-white" id="edit-categoria"><i class="fas fa-save"></i> Guardar</a>

            <a class="btn btn-danger text-white categorias"><i class="fas fa-ban"></i> Cancelar</a>

        </div>

    </div>

    <div class="col-md-3"></div>

</div>
<?php endforeach;?>
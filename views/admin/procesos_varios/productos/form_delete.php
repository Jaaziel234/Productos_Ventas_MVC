<script src="../../public/js/funciones-navbar.js"></script>

<script src="../../public/js/funciones-productos.js"></script>

<?php  

session_start();
include_once "../../../../models/conexion.php";
include_once "../../../../models/procesos.php";
include_once "../../../../controllers/procesos.php";

$id = $_GET['id'];
$query = "SELECT * FROM productos WHERE id_producto='$id'";
$datospro = SelectData($query, "i");
foreach ($datospro as $result) {
    $estado = $result['estado'];
}
?>
<?php if ($estado == 0): ?>

<div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-6">

        <h3 style="text-align: center;">Activar Producto</h3>

        <hr>

        <div class="input-group mb-3 d-flex justify-content-center">
        <h5>Desea activar este producto?</h5>
            

            <input type="hidden" name="id_productod" id="id_productod" class="form-control"  required="on" value="<?php echo $_GET['id']; ?>" autocomplete="off" />
            <input type="hidden" name="estadopro" id="estadopro" class="form-control"  required="on" value="<?php echo $estado; ?>" autocomplete="off" />

        </div>

        <div class="d-flex justify-content-center">

            <a class="btn btn-primary text-white mr-2" id="delete-producto"><i class="fas fa-save">Activar </i></a>

            <a class="btn btn-warning text-white productos"><i class="fas fa-ban"></i> Cancelar</a>

        </div>

    </div>

    <div class="col-md-3"></div>

</div>

<?php else: ?>

    <div class="row">

<div class="col-md-3"></div>

<div class="col-md-6">

    <h3 style="text-align: center;">Desactivar Producto</h3>

    <hr>

    <div class="input-group mb-3 d-flex justify-content-center">
    <h5>Desea desactivar este producto?</h5>
        

        <input type="hidden" name="id_productod" id="id_productod" class="form-control"  required="on" value="<?php echo $_GET['id']; ?>" autocomplete="off" />
        <input type="hidden" name="estadopro" id="estadopro" class="form-control"  required="on" value="<?php echo $estado; ?>" autocomplete="off" />
    </div>

    <div class="d-flex justify-content-center">

        <a class="btn btn-danger text-white mr-2" id="delete-producto"><i class="fas fa-save">Desactivar </i></a>

        <a class="btn btn-warning text-white productos"><i class="fas fa-ban"></i> Cancelar</a>

    </div>

</div>

<div class="col-md-3"></div>

</div>
<?php endif;?>
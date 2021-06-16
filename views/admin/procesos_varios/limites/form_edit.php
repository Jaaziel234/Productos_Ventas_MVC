
<?php
include "../../../../models/conexion.php";
include "../../../../models/procesos.php";
include "../../../../controllers/procesos.php";

$id = $_GET['id'];
$query = "SELECT * FROM limites_productos WHERE id_limite='$id'";

$productoselect = SelectData($query, "i");

foreach ($productoselect as $result){
    $stock = $result['limite'];
}
?>

<script src="../../public/js/funciones-navbar.js"></script>

<script src="../../public/js/funciones-limites.js"></script>



<div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-6">

        <h3 style="text-align: center;">Editar Limite</h3>

        <hr>


        <div class="input-group mb-3">

            <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon1">Limite</span>

            </div>
            <input type="hidden" id="idedit" value="<?php echo $id ?>">

            <input type="text" name="limiteedit" id="limiteedit" class="form-control" value="<?php echo $stock; ?>" placeholder="Cantidad del limite" required="on" autocomplete="off" />
        </div>

        <div>

            <a class="btn btn-primary text-white" id="editlimiti"><i class="fas fa-save"></i> Guardar</a>

            <a class="btn btn-danger text-white limites"><i class="fas fa-ban"></i> Cancelarrrrr</a>

        </div> 

    </div>

    <div class="col-md-3"></div>

</div>
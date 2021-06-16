<script src="../../public/js/funciones-navbar.js"></script>

<script src="../../public/js/funciones-limites.js"></script>

<?php  

session_start();
include_once "../../../../models/conexion.php";
include_once "../../../../models/procesos.php";
include_once "../../../../controllers/procesos.php";

$id = $_GET['id'];
?>


<div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-6">

        <h3 style="text-align: center;">Eliminar Limite</h3>

        <hr>

        <div class="input-group mb-3 d-flex justify-content-center">
        <h5>Desea eliminar este limite?</h5>
            

            <input type="hidden" name="id_limitedelete" id="id_limitedelete" class="form-control"  required="on" value="<?php echo $id ?>" autocomplete="off" />
           

        </div>

        <div class="d-flex justify-content-center">

            <a class="btn btn-danger text-white mr-2" id="delete-limite"><i class="fas fa-trash">Eliminar </i></a>

            <a class="btn btn-primary text-white limites"><i class="fas fa-ban"></i> Cancelar</a>

        </div>

    </div>

    <div class="col-md-3"></div>

</div>

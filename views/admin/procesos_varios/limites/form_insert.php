
<?php
include "../../../../models/conexion.php";
include "../../../../models/procesos.php";
include "../../../../controllers/procesos.php";


$query = "SELECT productos.nombre_producto AS productos,
productos.id_producto AS id_producto
FROM inventarios
INNER JOIN productos ON productos.id_producto = inventarios.id_producto
WHERE inventarios.id_producto NOT IN (SELECT id_producto FROM limites_productos)";

$productoselect = SelectData($query, "i");
?>

<script src="../../public/js/funciones-navbar.js"></script>

<script src="../../public/js/funciones-limites.js"></script>



<div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-6">

        <h3 style="text-align: center;">Registrar Limite</h3>

        <hr>

        <div class="input-group mb-3">

            <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon1">Producto</span>

            </div>

            <select class="form-control" name="producto" id="producto" require>
                   
                    <?php if($productoselect = SelectData($query, "i")): ?>
                    <?php foreach ($productoselect as $result) : ?>
                        <option value="<?php echo $result['id_producto'] ?>"><?php echo $result['productos'] ?></option>
                    <?php endforeach ?>
                    <?php else:  ?>
                    <option value="nada">Seleccione producto</option>
                    <?php endif; ?>

            </select>
        </div>
        <div class="input-group mb-3">

            <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon1">Limite</span>

            </div>

            <input type="text" name="limite" id="limite" class="form-control" placeholder="Cantidad del limite" required="on" autocomplete="off" />
        </div>

        <div>

            <a class="btn btn-primary text-white" id="save-limite"><i class="fas fa-save"></i> Guardar</a>

            <a class="btn btn-danger text-white limites"><i class="fas fa-ban"></i> Cancelar</a>

        </div> 

    </div>

    <div class="col-md-3"></div>

</div>
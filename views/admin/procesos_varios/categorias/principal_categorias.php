<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-categorias.js"></script>

<?php 
session_start();
include "../../../../models/conexion.php";
include "../../../../models/procesos.php";
include "../../../../controllers/procesos.php";
include "proceso_paginado.php";

?>
<?php if($DataCategorias): ?>
<?php 
include 'select_y_buscador.php'; 
include 'tabla_categorias.php';
include 'boton_next_back.php';

?>

<?php else: ?>
    <div class="alert alert-danger">
        Nose encuentran datos.....

    </div>

<?php endif; ?>


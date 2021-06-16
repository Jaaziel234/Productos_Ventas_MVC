<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-inventarios.js"></script>

<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";
    include "proceso_paginado.php";

    
 
?>
<?php if ($Datainventarios):?>
    <?php
    include "select_y_buscador.php";
    include "tabla_inventario.php"; 
    include "boton_next_back.php"; 
    ?>

<?php else: 
        include "select_y_buscador.php";
    ?>
    <div class ="alert alert-danger">
    No se encuentran datos...
    </div>
    <?php endif; ?>
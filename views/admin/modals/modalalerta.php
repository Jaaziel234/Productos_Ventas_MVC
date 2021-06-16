<!-- Button trigger modal -->
<?php

$query = "SELECT inventarios.stock as stock,
productos.nombre_producto as producto,
productos.unidad_medida as unidad,
categorias.categoria as categoria,
categorias.id_categoria as id_categoria,
limites_productos.limite as limite
FROM inventarios
INNER JOIN productos on productos.id_producto = inventarios.id_producto
INNER JOIN categorias on categorias.id_categoria = inventarios.id_categoria
INNER JOIN limites_productos on limites_productos.id_producto = inventarios.id_producto
WHERE limites_productos.limite >= inventarios.stock";

$Datastock = SelectData($query, "i");
?>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-danger">
        <h5 class="modal-title" id="exampleModalLongTitle text-center">AVISO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="d-flex justify-content-center ">Hola, a continuacion se muestran los productos que se estan escaseando..</h5>
            <style>
            th,
            td{
                text-align: center;
                vertical-align: middle;

            }
            
        </style>
        <table class="table table-bordered table-responsive-md table-sm">

        <thead class="thead-dark">
        <tr>
        <th>N°</th>
        <th>Producto</th>
        <th>Categoria</th>
        <th>Stock</th>
        <th>Limite</th>
        </tr>

        </thead>
        <tbody>

        <?php foreach ($Datastock AS $result): ?>
            <tr>
                <td><?php  echo $cont +=1; ?></td>
                <td><?php  echo $result["producto"]; ?></td>
                <td><?php  echo $result["categoria"]; ?></td>
                <td><?php  echo $result["stock"]." (".$result["unidad"].")" ?></td>
                <td><?php  echo $result["limite"]; ?></td>


            </tr>
        <?php endforeach; ?>



        </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ACEPTAR</button>
      </div>
    </div>
  </div>
</div>
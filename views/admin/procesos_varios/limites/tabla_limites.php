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
<th>ID</th>
<th>Producto</th>
<th>Categoria</th>
<th>Limite</th>
<th colspan="2">Procesos</th>
</tr>

</thead>
<tbody>

<?php foreach ($DataCategorias AS $result): ?>
    <tr>
        <td><?php  echo $cont +=1; ?></td>
        <td><?php  echo $result["id_limite"]; ?></td>
        <td><?php  echo $result["nombre_producto"]; ?></td>
        <td><?php  echo $result["categoria"]; ?></td>
        <td><?php  echo $result["limite"]; ?></td>
        <td>
            <a href="#" class="btn btn-success editlimit" id-limite="<?php  echo $result["id_limite"]; ?>">
                <i class="fa fa-edit"></i>
            </a>
        </td>
        <td>
            <a href="#" class="btn btn-danger delelimit" id-limited="<?php  echo $result["id_limite"]; ?>">
                <i class="fa fa-trash-alt"></i>
            </a>
        </td>


    </tr>
<?php endforeach; ?>



</tbody>
</table>
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
<th>Categoria</th>
<th>Imagen</th>

<th colspan="2">Procesos</th>
</tr>

</thead>
<tbody>

<?php foreach ($DataCategorias AS $result): ?>
    <tr> 
        <td><?php  echo $cont +=1; ?></td>
        <td><?php  echo $result["id_categoria"]; ?></td>
        <td><?php  echo $result["categoria"]; ?></td>
        <td><img src="<?php echo '../../public/img/'.$result['imagen_categoria']; ?>" width="60px" height="60px"></td>
        <td>
            <a href="" class="btn btn-success editacate" id-categoria="<?php  echo $result["id_categoria"]; ?>">
                <i class="fa fa-edit"></i>
            </a>
        </td>
        <td>
        <?php if($result['estado'] == 0):?>
            <a href="#" class="btn btn-primary categestado" id-categoria="<?php  echo $result["id_categoria"]; ?>" estado="<?php  echo $result["estado"]; ?>">
            <i class="fas fa-check"></i>
            </a>
                    <?php else:?>
                        <a href="#" class="btn btn-danger categestado" id-categoria="<?php  echo $result["id_categoria"]; ?>" estado="<?php  echo $result["estado"]; ?>">
                        <i class="fas fa-times"></i>
            </a>
                    <?php endif; ?>
            
        </td>


    </tr>
<?php endforeach; ?>



</tbody>
</table>
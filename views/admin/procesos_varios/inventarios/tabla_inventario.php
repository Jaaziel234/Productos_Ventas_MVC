<style>
    th,
    td {
        text-align: center;
        vertical-align: middle;
    }
</style>
<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead class="thead-dark">
            <tr>
                <th>N°</th>
                <th>Inventario</th>
                <th>Producto</th>
                <th>Categoría</th> 
                <th>Stock</th>
                <th>Imagen</th>
                <th colspan="2">Procesos</th>
            </tr> 
        </thead>
        <tbody>
            <?php foreach ($Datainventarios as $result) : ;?>
                
                <tr>
                    <td><?php echo $con += 1; ?></td>
                    <td><?php echo $result['id_inventario']; ?></td>
                    <td><?php echo $result['nombre_producto']; ?></td>
                    <td><?php echo $result['categoria']; ?></td>
                    <td><?php echo $result['stock']; ?></td>
                    <td><img src="<?php echo '../../public/img/'.$result['imagen']; ?>" width="60px" height="60px"></td>
                    <td>
                    <?php if($result['estado'] == 0):?>
                        <a href="#" class="btn btn-info investado" id-inventario="<?php echo $result['id_inventario'] ?>" estado="<?php echo $result['estado'] ?>"s>
                        <i class="fas fa-check-circle"></i>
                        </a>
                    <?php else:?>
                        <a href="#" class="btn btn-danger investado" id-inventario="<?php echo $result['id_inventario'] ?>" estado="<?php echo $result['estado'] ?>">
                        <i class="fas fa-times"></i>
                        </a>
                    <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
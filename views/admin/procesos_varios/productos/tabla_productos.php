<style>
        td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <table class="table table-bordered table-resposive-md table-sm">

        <thead  class="thead-dark">
            <tr>
                <th>N°</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Unidad</th>
                <th>Foto</th>
                <th colspan="2">Procesos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($DataCategorias as $result) : ?>
                <tr>
                    <td><?php echo $cont += 1; ?></td>
                    <td><?php echo $result['id_producto'] ?></td>
                    <td><?php echo $result['nombre_producto'] ?></td>
                    <td><?php echo $result['descripcion'] ?></td>
                    <td><?php echo $result['precio_compra'] ?></td>
                    <td><?php echo $result['precio_venta'] ?></td>
                    <td><?php echo $result['unidad_medida'] ?></td>
                    <td><img src="<?php echo '../../public/img/'.$result['imagen']; ?>" width="60px" height="60px"></td>

                    <td><a href="#" class="btn btn-success proedit" id-producto="<?php echo $result['id_producto'] ?>">
                            <i class="fas fa-edit"></i>
                        </a></td>
                    <td>
                    <?php if($result['estado'] == 0):?>
                        <a href="#" class="btn btn-primary prodelete" id-producto="<?php echo $result['id_producto'] ?>">
                        <i class="fas fa-check"></i>
                        </a>
                    <?php else:?>
                        <a href="#" class="btn btn-danger prodelete" id-producto="<?php echo $result['id_producto'] ?>">
                        <i class="fas fa-times"></i>
                        </a>
                    <?php endif; ?>
                        
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
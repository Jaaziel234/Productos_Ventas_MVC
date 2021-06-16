<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-productos.js"></script>
<?php 
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";
?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-12">
        <h3 style="text-align: center;">Registro de Inventario</h3>
        <hr>
        <div class="row cols-md-6">
            <div class="col">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Producto</span>
                    </div>
                    <input type="text" name="producto" id="producto" class="form-control" placeholder="Nombre Producto" required="on" autocomplete="off" />
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Descripción</span>
                    </div>
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control" placeholder="Detalles del producto" required="on" autocomplete="off"></textarea>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Cantidad</span>
                    </div>
                    <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="Productos a inventario" required="on" autocomplete="off" />
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Unidad Medida</span>
                    </div>
                    <select name="uni_med" id="uni_med" class="form-control" required="on" >
                        <option value="0"></option>
                        <option value="Libras">Libras</option>
                        <option value="Kilos">Kilos</option>
                        <option value="Onzas">Onzas</option>
                        <option value="Botella">Botella</option>
                        <option value="Lata">Lata</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Precio Compra</span>
                    </div>
                    <input type="text" name="precio_compra" id="precio_compra" class="form-control" placeholder="$0.00" required="on" autocomplete="off" />
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Precio Venta</span>
                    </div>
                    <input type="text" name="precio_venta" id="precio_venta" class="form-control" placeholder="$0.00" required="on" autocomplete="off" />
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Imagen</span>
                    </div>
                    <input type="file" name="imagen" id="imagen" class="form-control" required="on" autocomplete="off" style="margin: auto;"/>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="text-align: center;">
        <a class="btn btn-primary text-white btn1" id="save-producto"><i class="fas fa-save"></i> Guardar</a>
        <a class="btn btn-danger text-white productos btn1"><i class="fas fa-ban"></i> Cancelar</a>
    </div>
    <div class="col-md-3"></div>
</div>
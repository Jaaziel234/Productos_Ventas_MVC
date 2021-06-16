<script src="../../public/js/funciones-navbar.js"></script>

<script src="../../public/js/funciones-categorias.js"></script>



<div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-6">

        <h3 style="text-align: center;">Registro Categoría</h3>

        <hr>

        <div class="input-group mb-3">

            <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon1">Categoría</span>
            <form id="add_catee" enctype="multipart/form-data">
            <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Nombre Categoría" required="on" autocomplete="off" >
            <input type="file" name="imagen" id="imagen">
            </form>
            
          

            </div>
            
            
           

            

        </div>
        <h5>Imagen</h5>
        
        <div>
        <img src="" width="200px" id="imagenmuestra" alt="">
        </div>

        <div>

            <a class="btn btn-primary text-white" id="save-categoria"><i class="fas fa-save"></i> Guardar</a>

            <a class="btn btn-danger text-white categorias"><i class="fas fa-ban"></i> Cancelar</a>

        </div>

    </div>

    <div class="col-md-3"></div>

</div>
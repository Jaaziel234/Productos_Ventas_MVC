$(document).ready(function() {
    $("a.productos").click(function(event){
        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
        event.preventDefault();
    });
    //envia el numero de pagina a productos .
    $("a.pagina").click(function(event) {
        var num, reg; 
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php?num="+num+"&num_reg="+reg);
        event.preventDefault();
    });

    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php?n_reg=1&num_reg=" + valor);
        event.preventDefault();
        
    });

    $("#like-producto").on('change', function(event) {
        var valor;
        valor = $("#like-producto").val();
        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php?like=1&valor=" + valor);
        event.preventDefault();
        
    });

    $("#new-producto").click(function(event) {
        $("#contenido-procesos").load("procesos_varios/productos/form_insert.php");
        event.preventDefault();
    });
    

    

    $("#add-product").on('submit',function(event){

        event.preventDefault();



        var formData = new FormData(document.getElementById('add-product'));

        formData.append("insert_pro","1");

        $.ajax({

            url: "procesos_varios/productos/IUD_productos.php",

            type: "post",

            dataType: "html",

            data: formData,

            cache: false,

            contentType: false,

            processData: false

        }).done(function(res){

            $("#contenido-procesos").html(res);

        })

    })

    $("a.proedit").click(function(event) {
        var id; 
        id = $(this).attr("id-producto");
        $("#contenido-procesos").load("procesos_varios/productos/form_edit.php?id="+id);
        event.preventDefault();
    });

    $("#edit-product").on('submit',function(event){

        event.preventDefault();



        var formData = new FormData(document.getElementById('edit-product'));

        formData.append("edit_pro","1");

        $.ajax({

            url: "procesos_varios/productos/IUD_productos.php",

            type: "post",

            dataType: "html",

            data: formData,

            cache: false,

            contentType: false,

            processData: false

        }).done(function(res){

            $("#contenido-procesos").html(res);

        })

    })

    $("a.prodelete").click(function(event) {
        var id; 
        id = $(this).attr("id-producto");
        $("#contenido-procesos").load("procesos_varios/productos/form_delete.php?id="+id);
        event.preventDefault();
    });

    $("#delete-producto").click(function(event) {
        var id = $("#id_productod").val();
        var estado = $("#estadopro").val();
        $("#contenido-procesos").load("procesos_varios/productos/IUD_productos.php?delete_pro=1&id="+ id+"&estado="+estado);
        event.preventDefault();
        
    });

  /*   $("#save-producto").click(function(event) {
        var categoria = $('#id_categoria').val();
        var producto = $('#nombre_producto').val();
        var descripcion = $('#descripcion').val();
        var cantidad = $('#cantidad').val();

        var unidad_medida = $('#unidad_medida').val();
        var precio_compra = $('#precio_compra').val();
        var precio_venta = $('#precio_venta').val();
        var imagen = $('#imagen').val();
        var idproducto = $('#id_producto').val();

        cadena = "categoria=" + categoria + "&producto=" + producto + "&descripcion=" + descripcion + 
        "&cantidad=" + cantidad + "&unidad_medida=" + unidad_medida + "&precio_compra="+
        precio_compra+"&precio_venta="+precio_venta+"&imagen="+imagen + "&id_producto=" + idproducto;
        

        $.ajax({
            type:"GET",
            url:"procesos_varios/productos/IUD_productos.php",
            data:cadena,
            
            
            success:function(r){
                if (r==1){
                $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
                 alertify.success('Producto agregado con exito');
                }
                else{
                 alertify.error('Error, en la base de datos');
                }
            }
    
        });
        event.preventDefault();
        
        
    });
 */
    
}); 




function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagenmuestra').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        
    }
    
}
$('#imagen').change(function () {
    readURL(this);
    
});
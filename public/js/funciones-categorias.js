$(document).ready(function() {
    $("a.categorias").click(function(event){
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
        event.preventDefault();
    });
    //envia el numero de pagina a categoria .
    $("a.pagina").click(function(event) {
        var num, reg; 
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php?num="+num+"&num_reg="+reg);
        event.preventDefault();
    });

    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php?n_reg=1&num_reg=" + valor);
        event.preventDefault();
        
    });

    $("#like-categoria").on('change', function(event) {
        var valor;
        valor = $("#like-categoria").val();
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php?like=1&valor=" + valor);
        event.preventDefault();
        
    });

    $("#new-cate").click(function(event) {
        $("#contenido-procesos").load("procesos_varios/categorias/form_insert.php");
        event.preventDefault();
    });

    $("#save-categoria").click(function(event) {
        event.preventDefault();



        var formData = new FormData(document.getElementById('add_catee'));

        formData.append("insert_cate","1");

        $.ajax({

            url: "procesos_varios/categorias/IUD_categoria.php",

            type: "post",

            dataType: "html",

            data: formData,

            cache: false,

            contentType: false,

            processData: false

        }).done(function(res){

            $("#contenido-procesos").html(res);

        })
    });

    $("a.editacate").click(function(event){
        var id;
        id = $(this).attr("id-categoria");
        $("#contenido-procesos").load("procesos_varios/categorias/form_edit.php?id="+id);
        event.preventDefault();
    });

    $("#edit-categoria").click(function(event) {
        event.preventDefault();



        var formData = new FormData(document.getElementById('edit_catee'));

        formData.append("edit_cate","1");

        $.ajax({

            url: "procesos_varios/categorias/IUD_categoria.php",

            type: "post",

            dataType: "html",

            data: formData,

            cache: false,

            contentType: false,

            processData: false

        }).done(function(res){

            $("#contenido-procesos").html(res);

        })
    });

    $("a.categestado").click(function(event) {
        var id, estado; 
        id = $(this).attr("id-categoria");
        estado = $(this).attr("estado");
        $("#contenido-procesos").load("procesos_varios/categorias/IUD_categoria.php?estado_cat=1&id="+id+"&estado="+estado);
        event.preventDefault();
    });

    
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
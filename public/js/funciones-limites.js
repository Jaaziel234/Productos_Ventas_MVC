$(document).ready(function() {
    $("a.limites").click(function(event){
        $("#contenido-procesos").load("procesos_varios/limites/principal_limites.php");
        event.preventDefault(); 
    });
    //envia el numero de pagina a categoria .
    $("a.pagina").click(function(event) {
        var num, reg; 
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/limites/principal_limites.php?num="+num+"&num_reg="+reg);
        event.preventDefault();
    });

    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-procesos").load("procesos_varios/limites/principal_limites.php?n_reg=1&num_reg=" + valor);
        event.preventDefault();
        
    });

    $("#like-limites").on('change', function(event) {
        var valor;
        valor = $("#like-limites").val();
        $("#contenido-procesos").load("procesos_varios/limites/principal_limites.php?like=1&valor=" + valor);
        event.preventDefault();
        
    });

    $("#new-limit").click(function(event) {
        $("#contenido-procesos").load("procesos_varios/limites/form_insert.php");
        event.preventDefault();
    });

    $("#save-limite").click(function(event) {
        var limite = $("#limite").val();
        var producto = $("#producto").val();
        console.log(producto);
        if (limite == "" && producto == "nada") {
            alertify.alert("Registro limite", "Faltan datos.....");
            event.preventDefault();
            
        } 
        else {
            $("#contenido-procesos").load("procesos_varios/limites/IUD_limites.php?insert-limit=1&limite="+ limite+ "&producto="+producto);
            event.preventDefault();
        }
    });


    $("a.editlimit").click(function(event){
        var id; 
        id = $(this).attr("id-limite");
        $("#contenido-procesos").load("procesos_varios/limites/form_edit.php?editlimit=1&id="+id);
        event.preventDefault(); 
    });

    $("#editlimiti").click(function(event) {
        id = $("#idedit").val();
        limite = $("#limiteedit").val();
        $("#contenido-procesos").load("procesos_varios/limites/IUD_limites.php?editlimit=1&limite="+ limite+"&id="+id);
        event.preventDefault();
    }); 

    $("a.delelimit").click(function(event){
        var id; 
        id = $(this).attr("id-limited");
        $("#contenido-procesos").load("procesos_varios/limites/form_delete.php?id="+id);
        event.preventDefault(); 
    });

    $("#delete-limite").click(function(event) {
        id = $("#id_limitedelete").val();
        $("#contenido-procesos").load("procesos_varios/limites/IUD_limites.php?deletetlimit=1&id="+id);
        event.preventDefault();
    });



    
});  
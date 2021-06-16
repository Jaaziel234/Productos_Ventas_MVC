$(document).ready(function() {
    $("a.inventarios").click(function(event){
        $("#contenido-procesos").load("procesos_varios/inventarios/principal_inventario.php");
        event.preventDefault();
    }); 
    //envia el numero de pagina a productos .
    $("a.pagina").click(function(event) {
        var num, reg; 
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/inventarios/principal_inventario.php?num="+num+"&num_reg="+reg);
        event.preventDefault();
    });

    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-procesos").load("procesos_varios/inventarios/principal_inventario.php?n_reg=1&num_reg=" + valor);
        event.preventDefault();
        
    });

    $("#like-inventario").on('change', function(event) {
        var valor;
        valor = $("#like-inventario").val();
        $("#contenido-procesos").load("procesos_varios/inventarios/principal_inventario.php?like=1&valor=" + valor);
        event.preventDefault();
        
    });
    $("a.investado").click(function(event) {
        var id, estado; 
        id = $(this).attr("id-inventario");
        estado = $(this).attr("estado");
        $("#contenido-procesos").load("procesos_varios/inventarios/IUD_inventarios.php?estado_inventario=1&id="+id+"&estado="+estado);
        event.preventDefault();
    });



    

    

    
});  


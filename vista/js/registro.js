//fucion para comprobar que el usuariio ya exixte
function comprobarUsuario(){
    consulta = $("#usuario").val();

    jQuery.ajax({
        url: "ajax/registro.php",
        data:'usuario='+consulta,
        type: "POST",
        success:function(data){
            $("#resultado").html(data);
           
        },
        error:function (){}
    });
}




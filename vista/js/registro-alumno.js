//fucion para comprobar que el usuariio ya exixte
function comprobarAlumno(){
     consulta = $("#usuario").val();

    jQuery.ajax({
        url: "ajax/registro-alumno.php",
        data:'usuario='+consulta,
        type: "POST",
        success:function(data){
            $("#resultado").html(data);
           
        },
        error:function (){}
    });
}

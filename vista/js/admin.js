//boton siguiente la parte 1
function btnSiguiente(){
	let vacio=true;
	let vacio1=true;
	let vacio2=true;
	let vacio3=true;

	if ($("#nombre").val().trim() === '') { vacio3=false; }
	if ($("#ingredientes").val().trim() === '') { vacio2=false; }
	if ($("#utencilios").val().trim() === '') {	vacio1=false; }
	if ($("#tiempopreparacion").val().trim() === '') { vacio=false; }
	if ((vacio==true)&(vacio1==true)&(vacio2==true)) {		
			$('section#parte1').hide();
		    $('section#parte2').show();
	}
}

//boton anterior parte 2
function btnAnterior2(){
	$('section#parte1').show();
	$('section#parte2').hide();
}

//boton siguiente parte 2
function btnSiguiente2(){
	let vacio=true;
	let vacio1=true;
	let vacio2=true;
	let vacio3=true;

	if ($("#caducidad").val().trim() === '') { vacio3=false; }
	if ($("#porciones").val().trim() === '') { vacio2=false; }
	if ($("#energia").val().trim() === '') {	vacio1=false; }
	if ($("#costopromedio").val().trim() === '') { vacio=false; }
	if ((vacio==true)&(vacio1==true)&(vacio2==true)) {	
		$('section#parte2').hide();
		$('section#parte3').show();
	}
}

//boton anterior parte 3
function btnAnterior3(){
	$('section#parte2').show();
	$('section#parte3').hide();
}

//boton siguiente parte 3
function btnSiguiente3(){
	let vacio=true;
	let vacio1=true;
	let vacio2=true;
	let vacio3=true;

	if ($("#rendimiento").val().trim() === '') { vacio3=false; }
	if ($("#proteinas").val().trim() === '') { vacio2=false; }
	if ($("#grasas").val().trim() === '') {	vacio1=false; }
	if ($("#hidratoscarbon").val().trim() === '') { vacio=false; }
	if ((vacio==true)&(vacio1==true)&(vacio2==true)) {		
		$('section#parte3').hide();
		$('section#parte4').show();
	}
}

//boton anterior parte 4
function btnAnterior4(){
	$('section#parte3').show();
	$('section#parte4').hide();
}


//fucion para comprobar que el usuariio ya exixte
function comprobarUsuario(){
     consulta = $("#usuario-general").val();

    jQuery.ajax({
        url: "ajax/registro.php",
        data:'usuario='+consulta,
        type: "POST",
        success:function(data){
            $("#resultadoUs").html(data);
           
        },
        error:function (){}
    });
}

//fucion para comprobar que el usuariio ya exixte
function comprobarAlumno(){
     consulta = $("#usuario-alumn").val();

    jQuery.ajax({
        url: "ajax/registro-alumno.php",
        data:'usuario='+consulta,
        type: "POST",
        success:function(data){
            $("#resultadoAl").html(data);
           
        },
        error:function (){}
    });
}

/* Busqueda de usuarios */
  $(document).ready(function(){
    $("#busquedaUsuario").keyup(function(){
      var consulta = $(this).val();

      if (consulta != "") {
        $.ajax({
          url:"controlador/buscar-usuario.php",
          method:"POST",
          data:{consulta:consulta},
          success:function(data){
           	$("#consultaUsuarios").hide();
            $("#resultadoBuscarUsuario").html(data);
            $("#resultadoBuscarUsuario").css("display","block");
           
          }
        });
      }else{
        $("#resultadoBuscarUsuario").css("display","none");
        $("#consultaUsuarios").show();
      }

    });
  });


/* Busqueda de alumnos */
  $(document).ready(function(){
    $("#busquedaAlumno").keyup(function(){
      var consulta = $(this).val();
      if (consulta != "") {
        $.ajax({
          url:"controlador/buscar-alumno.php",
          method:"POST",
          data:{consulta:consulta},
          success:function(data){
           	$("#consultaAlumnos").hide();
            $("#resultadoBuscarAlumno").html(data);
            $("#resultadoBuscarAlumno").css("display","block");
           
          }
        });
      }else{
        $("#resultadoBuscarAlumno").css("display","none");
        $("#consultaAlumnos").show();
      }

    });
  });

  /* Busqueda de platillos */
  $(document).ready(function(){
    $("#busquedaPlatillo").keyup(function(){
      var consulta = $(this).val();
      if (consulta != "") {
        $.ajax({
          url:"controlador/buscar-platillo.php",
          method:"POST",
          data:{consulta:consulta},
          success:function(data){
           	$("#consultaPlatillos").hide();
            $("#resultadoBuscarPlatillo").html(data);
            $("#resultadoBuscarPlatillo").css("display","block");
           
          }
        });
      }else{
        $("#resultadoBuscarPlatillo").css("display","none");
        $("#consultaPlatillos").show();
      }

    });
  });



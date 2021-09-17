//boton siguiente 1
function btnsiguente() {
    var vacio=true;
    var vacio1=true;
    if($("#apellidos").val().length < 1) {
        Swal.fire({
            title: 'Los apellidos son obligatorios',
            showConfirmButton: false,
            timer: 1000
            })
        vacio1= false;
    }
    if($("#nombre").val().length < 1) {
        Swal.fire({
            title: 'El nombre es obligatorio',
            showConfirmButton: false,
            timer: 1000
            })
        vacio= false;
    }
    if((vacio == true)&(vacio1== true)){
        $('section#slidepage').css('display','none');
        $('section#page_personal').css('display','block');
        
    }
} 
//boton siguiente 2
function btnsiguienteSec(){
    var vacio=true;
    var vacio1=true;

    if ($('#sexo').val().trim() === '') {
       Swal.fire({
            title: 'Seleccione su sexo',
            showConfirmButton: false,
            timer: 1000
            })
        vacio1= false;

    } 
    if($("#edad").val().length < 1) {
        Swal.fire({
            title: 'La edad es obligatoria',
            showConfirmButton: false,
            timer: 1000
            })
        vacio= false;
    }

    if((vacio == true)&(vacio1== true)){
        $('section#page_personal').css('display','none');
        $('section#page_grado').css('display','block');
    }

   
        
}

//boton siguiente 3
function btnsiguienteTre(){

    var vacio=true;
    var vacio1=true;
    if ($('#grado').val().trim() === '') {
        Swal.fire({
             title: 'Seleccione su grado',
             showConfirmButton: false,
             timer: 1000
             })
         vacio1= false;
 
     } 

    if ($('#nivel').val().trim() === '') {
       Swal.fire({
            title: 'Seleccione su nivel',
            showConfirmButton: false,
            timer: 1000
            })
        vacio1= false;

    } 
    if((vacio == true)&(vacio1== true)){
        $('section#page_grado').css('display','none');
        $('section#page_detalles').css('display','block');
    }
   
}

//boton enviar 
function btnenviar(){
   
    if($("#usuario").val().length < 1) {
        Swal.fire({
            title: 'El usario es obligatorio',
            showConfirmButton: false,
            timer: 1000
            })
    }
    if($("#contrasena").val().length < 1) {
        Swal.fire({
            title: 'La contraseña es obligatorio',
            showConfirmButton: false,
            timer: 1000
            })
    }
}


//boton anterior 1
function btnAteriorpri() {
    $('section#slidepage').css('display','block');
    $('section#page_personal').css('display','none');
} 
//boton anterior 2
function btnAteriorSec(){
    $('section#page_personal').css('display','block');
    $('section#page_grado').css('display','none');
    
}

//boton anterior 3
function bbtnAteriorTre(){
    $('section#page_grado').css('display','block');
    $('section#page_detalles').css('display','none');
}








var arreglo= new Array();
var arregloJugar= [];
var contador= 0;
var contador_fallos=0;
var contador_aciertos=0;
var contador_tiempo=59;
var aleatorio;
var ciclo_tiempo;

window.onload= function(){
    for(i=1; i<=4; i++){
        for(j=0; j>=0; j++){
            aleatorio=Math.floor(Math.random()*8+1);
            if(arreglo[aleatorio]==undefined){
                document.getElementById('c'+ aleatorio).style.backgroundImage='url(../../vista/images/' + i +')';
                document.getElementById("c" + aleatorio).style.pointerEvents="none";
                contador++;
            }
            if(contador== 2){
                break;
            }
        }
        contador=0;
    }
    fondo();
    funcion_tiempo();
}

function fondo(){
   var ciclo= setInterval(function(){
       for(i=1; i<=8; i++){
           document.getElementById('carta'+i).style.backgroundImage='url(../../vista/images/fondo.jpg)';
           document.getElementById('c'+i).style.pointerEvents= "auto";
       }
       clearInterval(ciclo);
   }, 3000); 
}






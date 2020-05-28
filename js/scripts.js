$( document ).ready(function() {
    //window.alert(':v');
    $( function() {
        $( "#datepicker" ).datepicker();
      } );

     $('#btnAE').click(function(){
        var ConUno = $('#Con').val();
        var ConDos = $('#ReCon').val();
        if(ConUno != ConDos){
          window.alert("Las contraseñas no coinciden");
          return false;
        }
     });

/* ------------- Preguntar si estan seguros de baja de empleado ------------- */
 
     $('#jsBtnBaja').click(function(){
     var m = "";
      if(confirm("Confirme baja...")){
       
    }
    else{
        return false;
    }
     });


});
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

});
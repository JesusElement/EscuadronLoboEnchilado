<?php

    session_start(); 
//echo   $_SESSION['id'];
//echo $_SESSION['Nombre'];
//echo $_SESSION['ApeUno'];
//echo $_SESSION['ApeDos'];
//echo $_SESSION['Rango'];
//echo $_SESSION['Sesion'];


//echo "<br>". $val_a = $_POST['nombreDForm'];
//echo "<br>". $val_b = $_POST['JefeDForm'];
if(isset($_POST['activo'])){
    $val_c = $_POST['activo'];
  
}else{
    $val_c = 0;
}
//echo "<br>". $val_d = $_POST['fecha']; 
    if(isset($_SESSION['Sesion'])){
        if ($_SESSION['Sesion'] == 'On' && $_SESSION['Rango'] == 1) {
           require_once('Clases.php');

           if(
               isset($_POST['nombreDForm']) && $_POST['nombreDForm'] != " " &&
               isset($_POST['JefeDForm']) && $_POST['JefeDForm'] != " " &&
               isset($_POST['fecha']) && $_POST['fecha'] != " " 
      
           ){

            $table = 'departamento';
            
            $col_q = 'Nombre' ;
            $col_w = 'idAutorizador' ;
            $col_e = 'Activo' ;
            $col_r = 'Creación' ;
            $col_t = 'Actualización';
            $col_y = 'PersonalActualiza' ;


                $hoy = date('Y-m-d');

            $val_a = $_POST['nombreDForm'];
            $val_b = $_POST['JefeDForm'];
            $val_c;
            $val_d = $_POST['fecha']; 
            $val_e = $hoy; //Actualizacion
            $val_f = $_SESSION['id'];
          
      

            $InserDepa = new DBC;
            $ResInserDepa = $InserDepa -> InsertaSeisDatos($table, $col_q, $col_w, $col_e, $col_r, $col_t, $col_y, $val_a, $val_b, $val_c, $val_d, $val_e, $val_f);
        
            echo "<script> alert('Actualizado!!!');
            location.href='Index.php'
          </script>";
        }else{
    

            // header("Location:AgregarEmpleadoForm.php?error=1");
            // exit();

           }
           
        }else{
            header("Location:login.php?error=1");
            exit();
        }
    }else{
        header("Location:login.php?error=1");
        exit();
    }



?>
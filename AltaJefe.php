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
//echo "<br>". $val_d = $_POST['fecha']; 
    if(isset($_SESSION['Sesion'])){
        if ($_SESSION['Sesion'] == 'On' && $_SESSION['Rango'] == 1) {
            require_once('php/Clases.php');
          

           if(isset($_GET['id'])){

            $table = 'jefes';
            
            $col_q = 'idEmpleadoJ';
            $col_w = 'FechaAlta';
 
        
            $val_a = $_GET['id'];
            $val_b = date('Y-m-d');

            $Asender = new DBC;
            $ResAsender = $Asender -> InsertaDosDatos($table, $col_q, $col_w, $val_a, $val_b);
            

            echo "<script> alert('Felicidades, Nuevo Jefe Aprovado!!!');
            location.href='AsenderEmpleado.php'
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
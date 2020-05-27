<?php

    session_start(); 
    if(isset($_SESSION['Sesion'])){
        if ($_SESSION['Sesion'] == 'On' && $_SESSION['Rango'] == 1) {
           require_once('Clases.php');

           if(
               isset($_POST['nombreForm']) && $_POST['nombreForm'] != "" &&
               isset($_POST['apeUnoForm']) && $_POST['apeUnoForm'] != "" &&
               isset($_POST['apeDosForm']) && $_POST['apeDosForm'] != "" &&
               isset($_POST['emailForm']) && $_POST['emailForm'] != "" &&
               isset($_POST['usuarioForm']) && $_POST['usuarioForm'] != "" &&
               isset($_POST['FechaForm']) && $_POST['FechaForm'] != "" &&
               isset($_POST['jefeForm']) && $_POST['jefeForm'] != "" &&
               isset($_POST['depaForm']) && $_POST['depaForm'] != "" &&
               isset($_POST['contraForm']) && $_POST['contraForm'] != "" &&
               isset($_POST['reContraForm']) && $_POST['reContraForm'] != "" 
            
           ){

            $table = 'empleados';
            
            $col_q = 'Nombre' ;
            $col_w = 'ApeUno' ;
            $col_e = 'ApeDos' ;
            $col_r = 'email' ;
            $col_t = 'FechaAlta' ;
            $col_y = 'idDepartamento' ;
            $col_u = 'idJefe' ;
            $col_i = 'idRango' ; 


            echo "<br>". $val_a = $_POST['nombreForm'];
            echo "<br>". $val_b = $_POST['apeUnoForm'];
            echo "<br>". $val_c = $_POST['apeDosForm'];
            echo "<br>". $val_d = $_POST['emailForm']; 
            echo "<br>". $val_e = $_POST['FechaForm']; 
            echo "<br>". $val_f = $_POST['depaForm'];
            echo "<br>". $val_g = $_POST['jefeForm'];
            echo "<br>". $val_h = 3;
           
      
            $InsertEmpleado = new DBC;
            $ResInsertEm = $InsertEmpleado->InsertaOchoDatos($table, $col_q, $col_w, $col_e, $col_r, $col_t, $col_y, $col_u, $col_i, $val_a, $val_b, $val_c, $val_d, $val_e, $val_f, $val_g, $val_h);
                        
            $table = 'usuario';
                         $col_q = 'usuario' ;
                         $col_w = 'Contra' ;
            echo "<br>". $val_a = $_POST['usuarioForm'];
            echo "<br>". $val_b = $_POST['contraForm'];
            
            $InsertaUser = new DBC;
            $ResInsertaUser = $InsertaUser->InsertaDosDatos($table, $col_q, $col_w, $val_a, $val_b);
               
           }else{
    

            header("Location:AgregarEmpleadoForm.php?error=1");
            exit();

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
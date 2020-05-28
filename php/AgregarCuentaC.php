<?php

    session_start(); 
    if(isset($_SESSION['Sesion'])){
        if ($_SESSION['Sesion'] == 'On' && $_SESSION['Rango'] == 1) {
           require_once('Clases.php');

           if(
               isset($_POST['idCuenta']) && $_POST['idCuenta'] != "" &&
               isset($_POST['Nombre']) && $_POST['Nombre'] != "" &&
               isset($_POST['Descripción']) && $_POST['Descripción'] != "" &&
               isset($_POST['Activo']) && $_POST['Activo'] != "" &&
               isset($_POST['Creacion']) && $_POST['Creacion'] != "" &&
               isset($_POST['Actualizacion']) && $_POST['Actualizacion'] != "" &&
               isset($_POST['idEmp']) && $_POST['idEmp'] != "" 
            
           ){

            $table = 'cuenta';
            
            $col_q = 'idCuenta' ;
            $col_w = 'Nombre' ;
            $col_e = 'Descripción' ;
            $col_r = 'Activo' ;
            $col_t = 'Creacion' ;
            $col_y = 'Actualizacion' ;
            $col_u = 'idEmp' ;


            echo "<br>". $val_a = $_POST['idCuenta'];
            echo "<br>". $val_b = $_POST['Nombre'];
            echo "<br>". $val_c = $_POST['Descripción'];
            echo "<br>". $val_d = $_POST['Activo']; 
            echo "<br>". $val_e = $_POST['Creacion']; 
            echo "<br>". $val_f = $_POST['Actualizacion'];
            echo "<br>". $val_g = $_POST['idEmp'];
            echo "<br>". $val_h = 3;
           
      
            $InsertCuenta = new DBC;
            $ResInsertCta = $InsertCuenta->InsertaSieteDatos($table,$col_q,$col_w,$col_e,$col_r,$col_t,$col_y,$col_u,$val_a,$val_b,$val_c,$val_d,$val_e,$val_f,$val_g);
                        
            $table = 'usuario';
                         $col_q = 'usuario' ;
                         $col_w = 'Contra' ;
            echo "<br>". $val_a = $_POST['usuarioForm'];
            echo "<br>". $val_b = $_POST['contraForm'];
            
            $InsertaUser = new DBC;
            $ResInsertaUser = $InsertaUser->InsertaDosDatos($table, $col_q, $col_w, $val_a, $val_b);
               
           }else{
    

            header("Location:AgregarCuentaC.php?error=1");
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
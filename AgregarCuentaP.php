<?php
 
    session_start(); 
    if(isset($_SESSION['Sesion'])){
        if ($_SESSION['Sesion'] == 'On' && $_SESSION['Rango'] == 1 || $_SESSION['Rango'] == 2) {
            require_once('php/Clases.php'); 
            //echo "<br>". $val_a = $_POST['idCuenta'];
            //echo "<br>". $val_b = $_POST['Nom'];
            //echo "<br>". $val_c = $_POST['Des'];
        
           if(isset($_POST['activo'])){
             $val_d = 1;
          
        }else{
         $val_d = 0;
        }
           if(
               isset($_POST["idCuenta"]) && $_POST["idCuenta"] != "" &&
               isset($_POST["Nom"]) && $_POST["Nom"] != "" &&
               isset($_POST["Des"]) && $_POST["Des"] != "" 
           ){
            $table = 'cuenta';
            $col = 'idCuenta' ;
            $val = $_POST["idCuenta"];
            $YaExiste = new DBC;
            $ResYa = $YaExiste -> ImprimirTodoDonde($table, $col, $val);
    while ($row=$ResYa->fetch_assoc()) {
           echo $Ya = $row['idCuenta'];
    }

      
            if (!isset($Ya)) {
               // echo'No existe';
                
            $table = 'cuenta';
            
            $col_q = 'idCuenta' ;
            $col_w = 'Nombre' ;
            $col_e = 'Descripción' ;
            $col_r = 'Activo' ;
            $col_t = 'Creacion' ;
            $col_y = 'Actualizacion' ;
            $col_u = 'IdEmp' ;


           // echo "<br>". $val_a = $_POST['idCuenta'];
           // echo "<br>". $val_b = $_POST['Nom'];
           // echo "<br>". $val_c = $_POST['Des'];
           // echo "<br>". $val_d;  
           // echo "<br>". $val_e = date('Y-m-d');
           // echo "<br>". $val_f = date('Y-m-d');
           // echo "<br>". $val_g = $_SESSION['id'];

            
            $val_a = $_POST['idCuenta'];
            $val_b = $_POST['Nom'];
            $val_c = $_POST['Des'];
            $val_d;  
            $val_e = date('Y-m-d');
            $val_f = date('Y-m-d');
            $val_g = $_SESSION['id'];
            
            
            $insertaCuenta = new DBC;
            $ResInC = $insertaCuenta -> InsertaSieteDatos($table, $col_q, $col_w, $col_e, $col_r, $col_t, $col_y, $col_u, $val_a, $val_b, $val_c, $val_d, $val_e, $val_f, $val_g);
           
            
             echo "<script> alert('Nueva cuenta Agregada!!!');
             location.href='AdministrarCuenta.php'
           </script>";
            } else {
                //echo 'Existe';
             echo "<script> alert('La cuenta existe (Revisa tu ID de Cuenta)!!!');
             location.href='AdministrarCuenta.php'
              </script>";
            }
            


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
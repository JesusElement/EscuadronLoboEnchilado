<?php
    require_once('ConectaCostos.php');
    if (isset($_POST['Usuario']) && $_POST['Usuario'] != "" && isset($_POST['Password']) && $_POST['Password']!= "") {
         $User = $conexion->real_escape_string($_POST['Usuario']);
         $Pass = $conexion->real_escape_string($_POST['Password']);

        $sql = "SELECT * from usuario where usuario = '$User'";
        $Res = $conexion ->query($sql);

        if ($Res===false) {
            trigger_error('Error, favor de reportarlo: '.$sql.'Error:'.$conexion->error, E_USER_ERROR);
        } else {
            $Res->data_seek(0);
        
            //  echo "<pre>";
            //   print_r($row=$Res->fetch_array(MYSQLI_NUM));
            // echo "</pre>";
            // print_r($row[1]);
            $row=$Res->fetch_array(MYSQLI_NUM);
           
            if ($User == $row[1]) {
                //echo"El usuario existe";
                if ($Pass == $row[2]) {
                    //echo"La contraseña es correcta";
                    //Opteniendo datos e iniciando sesion
                        
                    $sql = "SELECT em.Nombre, em.ApeUno, em.ApeDos, em.FechaBaja, em.idRango  FROM empleados as em INNER JOIN usuario as u on em.idEmpleados = u.idCuenta  WHERE em.idEmpleados = '$row[0]'";
                    $Res = $conexion->query($sql);
                    if ($Res===false) {
                        trigger_error('Error, favor de reportarlo: '.$sql.'Error:'.$conexion->error, E_USER_ERROR);
                    }else{
                       
              echo "<pre>";
               print_r($row=$Res->fetch_array(MYSQLI_NUM));
             echo "</pre>";
            //   $row=$Res->fetch_array(MYSQLI_NUM);
            //  vamos a revisar que el usuario siga activo
                        if ($row[3] == null ) {
                            echo"Trabajador Activo";
                            session_start();
                            $_SESSION['Nombre'] = $row[0];
                            $_SESSION['ApeUno'] = $row[1];
                            $_SESSION['ApeDos'] = $row[2];
                            $_SESSION['Rango'] = $row[4];
                            $_SESSION['Sesion'] = 'On';
                            header("Location:../Index.php");
                            exit();
                         
                        }else{
                            echo"Trabajdor Inactivo";
                            header("Location:../login.php?error=7");
                            exit();
                        }
                    }
                
                }else{
                    header("Location:../login.php?error=4");
                    exit();
                }
            } else {
                header("Location:../login.php?error=3");
                exit();
            }
        }
    } else {
        header("Location:../login.php?error=6");
        exit();
    }
    

?>
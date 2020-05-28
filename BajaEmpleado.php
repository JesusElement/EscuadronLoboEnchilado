<?php
    session_start(); 
//echo $_SESSION['id'];
//echo $_SESSION['Nombre'];
//echo $_SESSION['ApeUno'];
//echo $_SESSION['ApeDos'];
//echo $_SESSION['Rango'];
//echo $_SESSION['Sesion']; 
    if(isset($_SESSION['Sesion'])){
        if ($_SESSION['Sesion'] == 'On' && $_SESSION['Rango'] == '1') {
           require_once('php/Clases.php');
           $Tab = "empleados";
           $ColumUpdate = 'FechaBaja';
           $ColumWhere = 'idEmpleados';
           $VarWhere = $_GET['id'];//Id del trabajador que estamos dando de baja
           $VarDato = date("Y-m-d");//Fecha de hoy en que lo dimos de baja
          
           $BajaEm = new DBC;
           $ResBajaEm = $BajaEm ->ActualizarUno($ColumUpdate, $ColumWhere, $VarWhere, $VarDato, $Tab);
           echo "<script> alert('Baja Autorizada!!!');
           location.href='AdministrarEmpleados.php'
          </script>"; 
        }else{
            header("Location:login.php?error=1");
            exit();
        }
    }else{
        header("Location:login.php?error=1");
        exit();
    }

?>
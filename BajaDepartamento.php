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
           $Tab = "departamento";
           $ColumUpdateUno = 'Activo';
           $ColumUpdateDos = 'Actualización';
           $ColumUpdateTres = 'PersonalActualiza';
           $ColumWhere = 'idDepartamento';
           $VarWhere = $_GET['id'];//Id del trabajador que estamos dando de baja
           $VarDatoUno = 0;
           $VarDatoDos = date("Y-m-d");//Fecha de hoy en que lo dimos de baja
           $VarDatoTres = $_SESSION['id'];
            $BajaDepa = new DBC;
 $ResBaja = $BajaDepa -> ActualizarTres($ColumUpdateUno, $ColumUpdateDos, $ColumUpdateTres, $ColumWhere, $VarWhere, $VarDatoUno, $VarDatoDos, $VarDatoTres, $Tab);
       
 echo "<script> alert('Baja Autorizada!!!');
 location.href='AdministraDepartamento.php'
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
<?php

session_start(); 
//echo $_SESSION['Nombre'];
//echo $_SESSION['ApeUno'];
//echo $_SESSION['ApeDos'];
//echo $_SESSION['Rango'];
//echo $_SESSION['Sesion']; 
if(isset($_SESSION['Sesion'])){
    if ($_SESSION['Sesion'] == 'On') {
       require_once('php/Clases.php');

/* -------------------------------------------------------------------------- */
/*               AQUI SE ACTUALIZAR LA INFORMACION DEL Empleado               */
/* -------------------------------------------------------------------------- */

//echo $_POST['idForm'];    
//echo $_POST['nombreForm'];
//echo $_POST['apeUnoForm'];
//echo $_POST['apeDosForm'];
//echo $_POST['emailForm']; 


if(
  isset($_POST['idForm'])     && $_POST['idForm'] != "" &&
  isset($_POST['nombreForm']) && $_POST['nombreForm'] != "" &&
  isset($_POST['apeUnoForm']) && $_POST['apeUnoForm'] != "" &&
  isset($_POST['apeDosForm']) && $_POST['apeDosForm'] != "" &&
  isset($_POST['emailForm']) && $_POST['emailForm'] != "" 
){

$Tab = 'empleados';

$ColumDos = 'Nombre' ;
$ColumTres = 'ApeUno' ;
$ColumCuatro = 'ApeDos' ;
$ColumCinco = 'email' ;
$ColumUno = 'idEmpleados';

echo "<br>". $VarDos = $_POST['nombreForm'];
echo "<br>". $VarTres = $_POST['apeUnoForm'];
echo "<br>". $VarCuatro = $_POST['apeDosForm'];
echo "<br>". $VarCinco = $_POST['emailForm'];

echo "<br>". $VarUno = $_POST['idForm']; 

$UpdateEm = new DBC;
$ResUpdateEm = $UpdateEm->ActualizarCuatro($ColumUno, $ColumDos, $ColumTres, $ColumCuatro, $ColumCinco, $VarUno, $VarDos, $VarTres, $VarCuatro, $VarCinco, $Tab);

echo "<script> alert('Baja Autorizada!!!');
location.href='AdministrarEmpleados.php'
</script>";

    }else{
      $table = "empleados";
      $col = "idEmpleados";
      $val = $_GET['id'];
      $EmpleadoInfo = new DBC;
      $ResEm = $EmpleadoInfo -> ImprimirTodoDonde($table, $col, $val);
        
    }
}else{
    // header("Location:login.php?error=1");
    // exit();
      }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Esqueleto</title>
  <?php
        include('Componentes/Recursos.php');
        ?>
</head>

<body>
  <div class="contenedor">
    <div class="header">
      <?php 
            include('Componentes/Header.php');
        ?>
    </div>
    <div class="contenido">
      <div class='FormAgregarEmpleado'>
        <h3>Actualizar Empleado</h3>
        <form action="ActualizarEmpleado.php" method="POST">
          <?php

                while ($row=$ResEm->fetch_assoc()) {
   
        echo "
        <div class='form-row'>
<div class='form-group col-md-12'>
  <label for='id'>id</label>
  <input type='text' value='".$row['idEmpleados']."' name='idForm' class='form-control' id='nom' required>
</div>
</div>
<div class='form-row'>
<div class='form-group col-md-12'>
  <label for='inputEmail4'>Nombre completo</label>
  <input type='text' value='".$row['Nombre']."' name='nombreForm' class='form-control' id='nom' required>
</div>
</div>
<div class='form-row'>
<div class='form-group col-md-6'>
  <label>Apellido uno</label>
  <input type='text' value='".$row['ApeUno']."' name='apeUnoForm' class='form-control' id='ApeUno' required>
</div>

<div class='form-group col-md-6'>
  <label>Apellido dos</label>
  <input type='text' value='".$row['ApeDos']."' name='apeDosForm' class='form-control' id='ApeDos' required>
</div>
</div>
<div class='form-row'>
<div class='form-group col-md-12'>
  <label>Email</label>
  <input type='email' value='".$row['email']."' class='form-control' name='emailForm' id='inputEmail4' required>
</div>
</div>
        ";
}
    
?>
          <input type="submit" class='btn btn-outline-info' value="Actualizar">
        </form>
      </div>
    </div>
    <div class="footer">
      <?php 
        include('Componentes/Footer.php');
        ?>
    </div>
  </div>
</body>
</html>
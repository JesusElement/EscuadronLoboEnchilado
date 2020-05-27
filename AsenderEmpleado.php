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
  isset($_POST['usuario']) && $_POST['usuario'] != "" &&
  isset($_POST['Contra']) && $_POST['Contra'] != "" 

){

$Tab = 'usuario';

$ColumUpdateUno = 'Rango' ;

$ColumWhere = 'id';

echo "<br>". $VarDatoUno = $_POST['usuario'];
echo "<br>". $VarDatoDos = $_POST['Contra'];


echo "<br>". $VarWhere = $_POST['idForm']; 


$UpdateEm = new DBC;
$ResUpdateEm = $UpdateEm->ActualizarDos($ColumUpdateUno, $ColumUpdateDos, $ColumWhere, $VarWhere, $VarDatoUno, $VarDatoDos, $Tab);

echo "<script> alert('Usuario Actualizado!!!');
location.href='AdministrarEmpleados.php'
</script>";

    }else{
      $table = "usuario";
      $col = "idCuenta";
      $val = $_GET['id'];
      $UsuarioInfo = new DBC;
      $ResUs = $UsuarioInfo -> ImprimirTodoDonde($table, $col, $val);

 
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
        <h3>Actualizar Usuario</h3>
        <form action="ActualizarUsuario.php" method="POST">
          <?php

                while ($row=$ResUs->fetch_assoc()) {
   
        echo "
        <div class='form-row'>
<div class='form-group col-md-12'>
  <label for='id'>id</label>
  <input type='text' value='".$row['idCuenta']."' name='idForm' class='form-control' id='nom' disabled required>
</div>
</div>
<div class='form-row'>
<div class='form-group col-md-12'>
  <label for='inputEmail4'>Usuario</label>
  <input type='text' value='".$row['usuario']."' name='usuario' class='form-control' id='nom' required>
</div>
</div>
<div class='form-row'>
<div class='form-group col-md-12'>
  <label>Contraseña</label>
  <input type='password' value='".$row['Contra']."' name='Contra' class='form-control' id='ApeUno' required>
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
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
    isset($_POST["idCuenta"]) && $_POST["idCuenta"] != "" &&
    isset($_POST["Nom"]) && $_POST["Nom"] != "" &&
    isset($_POST["Des"]) && $_POST["Des"] != "" 

){
     
     $Tab = 'cuenta';
     
    
     $ColumDos = 'Nombre' ;
     $ColumTres = 'Descripción' ;
     $ColumCuatro = 'Actualizacion' ;
     $ColumCinco = 'IdEmp' ;
    
     echo "<br>". $ColumUno = 'idCuenta' ;//Where
     echo "<br>". $VarUno = $_POST['idCuenta'];//Where
     
     echo "<br>". $VarDos = $_POST['Nom'];
     echo "<br>". $VarTres = $_POST['Des'];
     echo "<br>". $VarCuatro = date('Y-m-d');
     echo "<br>". $VarCinco = $_SESSION['id'];


      $UpdateEm = new DBC;
      $ResUpdateEm = $UpdateEm->ActualizarCuatro($ColumUno, $ColumDos, $ColumTres, $ColumCuatro, $ColumCinco, $VarUno, $VarDos, $VarTres, $VarCuatro, $VarCinco, $Tab);   
        echo "<script> alert('Cuenta Actualizada!!!');
        location.href='AdministrarCuenta.php'
        </script>";

    }else{
      $table = "cuenta";
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
  <title>Actualizar Cuenta</title>
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
        <h3>Actualizar Cuenta</h3>
        <form action="ActualizarCuenta.php" method="POST">
          <?php

                while ($row=$ResUs->fetch_assoc()) {
   
        echo "
        <div class='form-row'>
<div class='form-group col-md-12'>
 
  <input type='text' value='".$row['idCuenta']."' name='idCuenta' class='form-control' id='nom' style='display: none;' required>
</div>
</div>
<div class='form-row'>
<div class='form-group col-md-12'>
  <label for='inputEmail4'>Nombre</label>
  <input type='text' value='".$row['Nombre']."' name='Nom' class='form-control' id='nom' required>
</div>
</div>
<div class='form-row'>
<div class='form-group col-md-12'>
  <label>Descripción</label>
  <input type='text' value='".$row['Descripción']."' name='Des' class='form-control' id='ApeUno' required>
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
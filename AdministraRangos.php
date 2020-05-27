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
//echo $_POST['idRn'];
  


if(
  isset($_POST['idForm'])     && $_POST['idForm'] != "" &&
  isset($_POST['idRn']) && $_POST['idRn'] != ""


){

$Tab = 'empleados';

$ColumUpdate = 'idRango' ;
$ColumWhere = 'idEmpleados';

echo "<br>". $VarDato = $_POST['idRn'];


echo "<br>". $VarWhere = $_POST['idForm']; 

    $AcRan = new DBC;
    $ResAc = $AcRan -> ActualizarUno($ColumUpdate, $ColumWhere, $VarWhere, $VarDato, $Tab);

echo "<script> alert('Nuevo rango asignado!!!');
location.href='AdministrarEmpleados.php'
</script>";

    }else{

/* ------------- Trayendo informacion del empleado seleccionado ------------- */

      $table = "empleados";
      $col = "idEmpleados";
      $val = $_GET['id'];
      $EmInfo = new DBC;
      $ResEm = $EmInfo -> ImprimirTodoDonde($table, $col, $val);
        
      while ($rowE=$ResEm->fetch_assoc()) {
        $idRan = $rowE['idRango'];  
     }
     //print_r($idRan);
     $ResEm->data_seek(0);

/* -------------------- Buscar caracteristicas del rango -------------------- */
     $table = 'rangos';
     $col = 'idRango';
     $val = $idRan;
     $NomRango = new DBC;
     $ResNR = $NomRango -> ImprimirTodoDonde($table, $col, $val);
     while ($rowNR=$ResNR->fetch_assoc()) {
        $IdRangoActual = $rowNR['idRango'];
       $NomRangoActual = $rowNR['descripcion'];
  }
              $ResNR->data_seek(0);

/* ------- Imprimir todo de id Rango para seleccionar los disponibles ------- */

    $table = 'rangos';
    $TodosRan = new DBC;
    $ResTodoRan = $TodosRan -> ImprimirTodo($table); 

  
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
  <title>Rango de Empleado</title>
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
        <h3>Cambiar Rango de Empleado</h3>
        <form action="AdministraRangos.php" method="POST" >
          <?php

                while ($row=$ResEm->fetch_assoc()) {
   
        echo "
        <div class='form-row'>
<div class='form-group col-md-12'>
  <label for='id'>id</label>
  <input type='text' value='".$row['idEmpleados']."' name='idForm' class='form-control' id='nom' style='display:none;'  required>
</div>
</div>
<div class='form-row'>
<div class='form-group col-md-12'>
  <label for='inputEmail4'>Nombre</label>
  <input type='text' value='".$row['Nombre']."'  class='form-control' id='nom' disabled required>
</div>
</div>
<div class='form-row'>
<div class='form-group col-md-6'>
  <label>Apellido uno</label>
  <input type='text' value='".$row['ApeUno']."' class='form-control' id='ApeUno' disabled required>
</div>

<div class='form-group col-md-6'>
  <label>Apellido dos</label>
  <input type='text' value='".$row['ApeDos']."'  class='form-control' id='ApeDos' disabled required>
</div>
</div>
        ";
}

echo"
<div class='form-row'>
      
<label for=''>Rango</label>
<select class='custom-select mr-sm-2' name='idRn' id='inlineFormCustomSelect' required>
<option disabled>Selecciona un Rango</option>
  <option value='".$IdRangoActual."' >".$NomRangoActual." (Actual)</option>";
    while ($row=$ResTodoRan->fetch_assoc()) {
      echo" <option value='".$row['idRango']."'>".$row['descripcion']."</option>";
       }
echo"
</select>
</div>

";
?>
          
          <br>
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
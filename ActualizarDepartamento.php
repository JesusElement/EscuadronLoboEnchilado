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
//echo $_POST['Nombre'];     
//echo $_POST['idAu'];     


if(
  isset($_POST['idForm'])   && $_POST['idForm'] != "" &&
  isset($_POST['Nombre']) && $_POST['Nombre'] != "" &&
  isset($_POST['idAu']) && $_POST['idAu'] != "" 

){

$Tab = 'departamento';

$ColumUpdateUno = 'Nombre' ;
$ColumUpdateDos = 'IdAutorizador' ;

$ColumWhere = 'idDepartamento';

echo "<br>". $VarDatoUno = $_POST['Nombre'];
echo "<br>". $VarDatoDos = $_POST['idAu'];


echo "<br>". $VarWhere = $_POST['idForm']; 


$UpdateDe = new DBC;
$ResUpdateDe = $UpdateDe->ActualizarDos($ColumUpdateUno, $ColumUpdateDos, $ColumWhere, $VarWhere, $VarDatoUno, $VarDatoDos, $Tab);

echo "<script> alert('Departamento Actualizado!!!');
location.href='AdministraDepartamento.php'
</script>";

    }else{

/* ------------------ Imprimir todo de un solo departamento ----------------- */

      $table = "departamento";
      $col = "idDepartamento";
      $val = $_GET['id'];
      $DepaInfo = new DBC;
      $ResDe = $DepaInfo -> ImprimirTodoDonde($table, $col, $val);

while ($rowJ=$ResDe->fetch_assoc()) {
   $idJefe = $rowJ['IdAutorizador'];  
}

$ResDe->data_seek(0);

/* ---------------------- Saber nombre del jefe actual ---------------------- */

      $NomJefeDepa = new DBC;
      $ResJD = $NomJefeDepa -> ImprimirJefeDepa($idJefe);

      while ($rowJD=$ResJD->fetch_assoc()) {
           $IdJefeActual = $rowJD['idJnom'];
          $NomJefeActual = $rowJD['nomJnom'];
     }
     
/* ---------------- Imprimir los je fes que se pueden asignar ---------------- */

      $JefeID = new DBC;
      $ResJefeID = $JefeID->jefeIdNom();
      $num_rows = $ResJefeID ->num_rows;
      $ResJefeID->data_seek(0);
      
 
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
  <title>Actualizar Departamento</title>
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
        <h3>Actualizar Departamento</h3>
        <form action="ActualizarDepartamento.php" method="POST">
          <?php

                while ($row=$ResDe->fetch_assoc()) {
   
        echo "
        <div class='form-row'>
<div class='form-group col-md-12'>
  <label for='id'></label>
  <input type='text' value='".$row['idDepartamento']."' name='idForm' class='form-control idD' id='nom'  required>
</div>
</div> 
<div class='form-row'>
<div class='form-group col-md-12'>
  <label for='inputEmail4'>Nombre Departamento</label>
  <input type='text' value='".$row['Nombre']."' name='Nombre' class='form-control' id='nom'  required>
</div>
</div>
        ";
}

echo"
<div class='form-row'>
      
<label for=''>Autoriza</label>
<select class='custom-select mr-sm-2' name='idAu' id='inlineFormCustomSelect' required>
<option disabled>Selecciona un Jefe o confirmelo</option>
  <option value='".$IdJefeActual."' >".$NomJefeActual." (Actual)</option>";
    while ($row=$ResJefeID->fetch_assoc()) {
      echo" <option value='".$row['idJefe']."'>".$row['Nombre']."</option>";
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
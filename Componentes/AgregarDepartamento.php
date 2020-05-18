<?php
    session_start(); 
    if(isset($_SESSION['Sesion'])){
        if ($_SESSION['Sesion'] == 'On') {
           require_once('php/Clases.php');
           

/* -------------------------------------------------------------------------- */
/*                          Obtener de base de datos                          */
/* -------------------------------------------------------------------------- */

/* ------------------- Funcion para imprimir jefes con ID ------------------- */
            
            $JefeID = new DBC;
            $ResJefeID = $JefeID->jefeIdNom();
            $num_rows = $ResJefeID ->num_rows;
            $ResJefeID->data_seek(0);
            
/* ----------------------------- Fin de funcion ----------------------------- */

/* ---------------- Funcion para imprimir departameto nombre ---------------- */
        
            $DepaID = new DBC;
            $ResDepa = $DepaID->departamentoNom();
            $num_rows = $ResDepa ->num_rows;
            $ResDepa->data_seek(0);

/* ----------------------------- Fin de funcion ----------------------------- */


        }else{
            header("Location:login.php?error=1");
            exit();
        }
    }else{
        header("Location:login.php?error=1");
        exit();
    }
?>
 
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Agregar Empleado</title>
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
        <div class="FormAgregarEmpleado">
            <h3>Agregar Departamento</h3>
            <hr>
    <form action="php/AgregarDepartamentoP.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Departamento</label>
      <input type="text" name="nombreForm" class="form-control" id="nom" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">Apellido uno</label>
      <input type="text" name="apeUnoForm" class="form-control" id="ApeUno" required>
    </div>
 
  <div class="form-group col-md-6">
      <label for="">Apellido dos</label>
      <input type="text" name="apeDosForm" class="form-control" id="ApeDos" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="">Email</label>
      <input type="email" class="form-control" name="emailForm" id="inputEmail4" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">Usuario</label>
      <input type="Usuario" name="usuarioForm" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-6">
      <label for="">Fecha de ingreso</label>
      <input type="date" name="FechaForm" class="form-control" id="datepicker" required>
    </div>
  </div>
  <div class="form-row">
      
      <label class="mr-sm-2 sr-only">Preference</label>
      <select class="custom-select mr-sm-2" name="jefeForm" id="inlineFormCustomSelect" >
        <option selected disabled>Jefe</option>
        <?php
        	while ($row=$ResJefeID->fetch_assoc()) {
               echo"<option value='".$row['idJefe']."'>".$row['Nombre']."</option>";
             }
        ?>
      </select>
    </div>
    <br>
    <div class="form-row">
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
      <select class="custom-select mr-sm-2" name="depaForm" id="inlineFormCustomSelect" required>
        <option selected disabled>Departamentos</option>
        <?php
        	while ($row=$ResDepa->fetch_assoc()) {
               echo"<option value='".$row['idDepartamento']."'>".$row['Nombre']."</option>";
             }
        ?>
      </select>
    </div>
    <br>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">Contraseña</label>
      <input type="password" name="contraForm" class="form-control" id="Con" required>
    </div>
    <div class="form-group col-md-6">
      <label for="">Confirma Contraseña</label>
      <input type="password" name="reContraForm" class="form-control" id="ReCon" required>
    </div>
  </div>
    
  <button type="submit" id="btnAE" class="btn btn-dark">Registrar</button>
  </div>
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

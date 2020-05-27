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
      <label for="">id Departamento</label>
      <input type="text" name="nombreForm" class="form-control" id="idDepartamento" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">Nombre </label>
      <input type="text" name="apeUnoForm" class="form-control" id="Nombre" required>
    </div>
 
  <div class="form-group col-md-6">
      <label for="">id Autorizador</label>
      <input type="text" name="apeDosForm" class="form-control" id="idAutorizador" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="">Activo</label>
      <input type="text" class="form-control" name="form-control" id="Active" required>
    </div>
  </div>

    <div class="form-group col-md-6">
      <label for="">Fecha de Creación</label>
      <input type="date" name="FechaForm" class="form-control" id="datepicker" required>
    </div>
    <div class="form-group col-md-6">
      <label for="">Fecha de Actualización</label>
      <input type="date" name="FechaForm" class="form-control" id="datepicker" required>
    </div>
    <div class="form-group col-md-6">
      <label for="">Persona que Autoriza</label>
      <input type="text" name="apeDosForm" class="form-control" id="idAutorizador" required>
    </div>
    <button type="submit" id="btnAE" class="btn btn-dark">Agregar</button>
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

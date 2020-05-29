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
        <title>Agregar Gastos</title>
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
            <h3>Agregar Gastos</h3>
            <hr>
    <form action="php/AgregarDepartamentoForm.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">id Gasto</label>
      <input type="text" name="idGasto" class="form-control" id="idGasto" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="">id Gasto Cabecero</label>
      <input type="text" name="GastoCabe" class="form-control" id="GastoCabe" required>
    </div>
 
  <div class="form-group col-md-12">
      <label for="">id Cuenta</label>
      <input type="text" name="idCuenta" class="form-control" id="idCuenta" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="">Concepto</label>
      <input type="text" class="form-control" name="Concept" id="Concept" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="">Usuario</label>
      <input type="Usuario" name="usuarioForm" class="form-control" id="inputEmail4" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="">Fecha del Comprobante</label>
      <input type="date" name="FechaForm" class="form-control" id="datepicker" required>
    </div>
  </div>
    <div class="form-group col-md-12">
      <label for="inputEmail4">Factura</label>
      <input type="text" name="idfactura" class="form-control" id="idfactura" required>
    </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Importe</label>
      <input type="text" name="Importe" class="form-control" id="Importe" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Impuesto</label>
      <input type="text" name="Impuesto" class="form-control" id="Impuesto" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">UUID</label>
      <input type="text" name="idImpuesto" class="form-control" id="idImpuesto" required>
    </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">XML</label>
      <input type="text" name="XML" class="form-control" id="XML" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Ruta</label>
      <input type="text" name="Path" class="form-control" id="Path" required>
    </div>
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

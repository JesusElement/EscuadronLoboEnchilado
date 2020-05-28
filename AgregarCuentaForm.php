<?php
    session_start(); 
    if(isset($_SESSION['Sesion'])){
        if ($_SESSION['Sesion'] == 'On') {
         

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
        <title>Agregar Cuentas al Catalogo</title>
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
            <h3>Agregar Cuenta Contable</h3>
            <hr>
    <form action="AgregarCuentaP.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-12 ">
      <label for="">idCuenta</label>
      <input type="text" name="idCuenta" class="form-control" id="nom" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="">Nombre</label>
      <input type="text" name="Nom" class="form-control" id="ApeUno" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="">Descripción de la Cuenta</label>
      <input type="text" name="Des" class="form-control" id="ApeDos" required>
    </div>
  </div>
  <div class="form-row">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="checkbox" name="activo"  aria-label="Radio button for following text input">
            </div>
        </div>
        <input type="text" class="form-control" value="¿Activar Cuenta?" disabled aria-label="Text input with radio button">
    </div>
</div>
    <br>
    <button type="submit" id="btnAE" class="btn btn-dark">Registrar</button>
  </div>
</form>

    <div class="footer">
        <?php 
        include('Componentes/Footer.php');
        ?>
    </div>
</div>

    </body>
</html>
           

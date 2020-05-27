
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
/*                    Funciones para imprimir en la pagina                    */
/* -------------------------------------------------------------------------- */

/* -------------------- Para llamar a las cuentas del catalogo ------------------- */
            $table = 'cuenta';
            $cuenta = new DBC;
            $Rescuenta = $cuenta -> ImprimirEmpUs($table);
   

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
<html lang="en">
    <head>
        <title>Administrar Cuentas</title>
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
        <div class="AdminEmpleadosCss">
        <h3>Catalogo de Cuentas</h3>
        <br>
        <table class="table tab">
  <thead class="thead-dark">
    <tr>
  
      <th scope="col">idCuenta</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Activo</th>
      <th scope="col">Creacion</th>
      <th scope="col">Actualizacion</th>
      <th scope="col">idEmpleado</th>
      
    

    </tr>
  </thead>
  <tbody>
    
  
        <?php
        // echo"<pre>";        
        // print_r($ResCuentas->fetch_assoc());
        // echo"</pre>";
    while ($row=$ResCuentas->fetch_assoc()) {
        echo"<tr scope='row'>";
      
         echo "<th scope='row'>".$row['idCuenta']."</th>";
         echo "<th scope='row'>".$row['Nombre']."</th>";
         echo "<th scope='row'>".$row['Descripción']."</th>";
         echo "<th scope='row'>".$row['Activo']."</th>";
         echo "<th scope='row'>".$row['Creacion']."</th>";
         echo "<th scope='row'>".$row['Actualizacion']."</th>";
         echo "<th scope='row'>".$row['idEmpleado']."</th>";
         echo "<td><a type='button' class='btn btn-outline-success' href='UsuarioEmpleado.php?id=".$row['idCuenta']."'>Usuario</a></td>";
         echo "<td><a type='button' id='jsBtnBaja' class='btn btn-outline-danger' href='BajaEmpleado.php?id=".$row['idEmpleados']."'>Baja</a></td>";
         echo "<td><a type='button' class='btn btn-outline-info' href='ActualizarEmpleado.php?id=".$row['idEmpleados']."'>Actualizar</a></td>";
         echo"</tr>";

    // [idCuenta]
    // [Nombre] 
    // [Descripción]
    // [Activo]
    // [Creacion] 
    // [Actualizacion]
    // [idEmpleado] 

      }
      ?>
    
  </tbody>
</table>

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


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

/* -------------------- Para llamar a todos los empleados ------------------- */
            $table = 'empleados';
            $Emplados = new DBC;
            $ResEmpleados = $Emplados -> ImprimirEmpUs($table);
   

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
        <title>Administrar Empleado</title>
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
        <h3>Lista de empleados</h3>
        <br>
        <table class="table tab">
  <thead class="thead-dark">
    <tr>
  
      <th scope="col">Nombre</th>
      <th scope="col">Apellido Uno</th>
      <th scope="col">Apellido Dos</th>
      <th scope="col">email</th>
      <th scope="col">Fecha Alta</th>
      <th scope="col">Fecha Baja</th>
      <th scope="col">Departamento</th>
      <th scope="col">Jefe</th>
      <th scope="col">Rango</th>
      <th scope="col">Usuario</th>
      <th scope="col">Baja</th>
      <th scope="col">Actualizar</th>
    

    </tr>
  </thead>
  <tbody>
    
        
        <?php
        // echo"<pre>";        
        // print_r($ResEmpleados->fetch_assoc());
        // echo"</pre>";
    while ($row=$ResEmpleados->fetch_assoc()) {
        echo"<tr scope='row'>";
      
         echo "<th scope='row'>".$row['Nombre']."</th>";
         echo "<th scope='row'>".$row['ApeUno']."</th>";
         echo "<th scope='row'>".$row['ApeDos']."</th>";
         echo "<th scope='row'>".$row['email']."</th>";
         echo "<th scope='row'>".$row['FechaAlta']."</th>";
         echo "<th scope='row'>".$row['FechaBaja']."</th>";
         echo "<th scope='row'>".$row['NomDepa']."</th>";
         echo "<th scope='row'>".$row['idJefe']."</th>";
         echo "<th scope='row'>".$row['idRango']."</th>";
         echo "<td><a type='button' class='btn btn-outline-success' href='UsuarioEmpleado.php?id=".$row['idCuenta']."'>Usuario</a></td>";
         echo "<td><a type='button' id='jsBtnBaja' class='btn btn-outline-danger' href='BajaEmpleado.php?id=".$row['idEmpleados']."'>Baja</a></td>";
         echo "<td><a type='button' class='btn btn-outline-info' href='ActualizarEmpleado.php?id=".$row['idEmpleados']."'>Actualizar</a></td>";
         echo"</tr>";

    // [idEmpleados]
    // [Nombre] 
    // [ApeUno]
    // [ApeDos]
    // [email] 
    // [FechaAlta]
    // [FechaBaja] 
    // [idDepartamento] 
    // [idJefe] 
    // [idRango] 
    // [idCuenta] 
    // [usuario]
    // [Contra]
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

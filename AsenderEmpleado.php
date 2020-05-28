
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
          
            $Jefes = new DBC;
            $ResJ = $Jefes -> Jefes();
            
   

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
        <title>Jefes</title>
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
        <a href="NuevoJefe.php" class="btn  btn-light btnJefe">Nuevo Jefe</a>  

        <h3  style="border-bottom: black 3px solid; padding: 3px;">Jefes Alta</h3>
    
        <br>
        <table class="table tab">
  <thead class="thead-dark">
    <tr>
  
      <th scope="col">Id Empleado</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido Uno</th>
      <th scope="col">Apellido Dos</th>
      <th scope="col">Fecha Alta</th>
      <th scope="col">Dar de baja</th>
      
    </tr>
  </thead>
  <tbody>
         
        <?php
         
      
    while ($row=$ResJ->fetch_assoc()) {
      if (isset($row['FechaBaja'])){

      }else{

        echo"<tr scope='row'>";
         echo "<th scope='row'>".$row['idEmpleados']."</th>";
         echo "<th scope='row'>".$row['Nombre']."</th>";
         echo "<th scope='row'>".$row['ApeUno']."</th>";
         echo "<th scope='row'>".$row['ApeDos']."</th>";
         echo "<th scope='row'>".$row['FA']."</th>";
        echo "<td><a type='button' id='jsBtnBaja' class='btn btn-outline-danger' href='BajaJefe.php?id=".$row['idEmpleados']."'>Baja</a></td>";
        }
      }
      ?>
    
  </tbody>
</table>
<br>

<h3 style="border-bottom: black 3px solid; padding: 3px;">Jefes Baja</h3>

        <br>
        <table class="table tab">
  <thead class="thead-dark">
    <tr>
  
      <th scope="col">Id Empleado</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido Uno</th>
      <th scope="col">Apellido Dos</th>
      <th scope="col">Fecha baja</th>
      
    </tr>
  </thead>
  <tbody>
         
        <?php
        // echo"<pre>";        
        // print_r($ResEmpleados->fetch_assoc());
        // echo"</pre>";
        $ResJ -> data_seek(0);
    while ($row=$ResJ->fetch_assoc()) {

      if (isset($row['FB'])){
        echo"<tr scope='row'>";
        echo "<th scope='row'>".$row['idEmpleados']."</th>";
        echo "<th scope='row'>".$row['Nombre']."</th>";
        echo "<th scope='row'>".$row['ApeUno']."</th>";
        echo "<th scope='row'>".$row['ApeDos']."</th>";
        echo "<th scope='row'>".$row['FB']."</th>";
      }else{


        }
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

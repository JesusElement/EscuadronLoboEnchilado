
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
          
            $Emplados = new DBC;
            $ResEmpleados = $Emplados -> NOTJefes();

/* ------------ Queremos saber quien ya es jefe para no mostrarlo ----------- */
           
        
   

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
        <title>Empleado Jefe</title>
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
        <h3>Lista de empleados Para Jefes</h3>
        <br>
        <table class="table tab">
  <thead class="thead-dark">
    <tr>

      <th scope="col">Nombre</th>
      <th scope="col">Apellido Uno</th>
      <th scope="col">Apellido Dos</th>
      <th scope="col">email</th>
      <th scope="col">Fecha Alta</th>
      <th scope="col">Nombrar Jefe</th>


    

    </tr>
  </thead>
  <tbody>
    
        
        <?php
        // echo"<pre>";        
        // print_r($ResEmpleados->fetch_assoc());
        // echo"</pre>";
  
       

    while ($row=$ResEmpleados->fetch_assoc()) {

       
        if (isset($row['FechaBaja'])) {
           //Si el trabajador esta dado de baja no puede ser jefe :v
       
        } else {
        
            echo"<tr scope='row'>";
            echo "<th scope='row'>".$row['Nombre']."</th>";
            echo "<th scope='row'>".$row['ApeUno']."</th>";
            echo "<th scope='row'>".$row['ApeDos']."</th>";
            echo "<th scope='row'>".$row['email']."</th>";
            echo "<th scope='row'>".$row['FechaAlta']."</th>";
            echo "<td><a type='button' class='btn btn-outline-warning btnNJ' href='AltaJefe.php?id=".$row['idEmpleados']."'>Nombrar</a></td>";      
            echo"</tr>";
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
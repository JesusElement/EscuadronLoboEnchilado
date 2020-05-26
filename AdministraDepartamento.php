
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
            $table = 'departamento';
            $DepaTodo = new DBC;
            $ResDepaTodo = $DepaTodo -> ImprimirTodo($table);
            
   

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
        <title>Administrar Departamento</title>
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
        <h3>Lista de Departamentos</h3>
        <br>
        <table class="table tab">
  <thead class="thead-dark">
    <tr>
  
      <th scope="col">Id Departamento</th>
      <th scope="col">Nombre</th>
      <th scope="col">Autoriza</th>
      <th scope="col">Acitvo</th>
      <th scope="col">Creación</th>
      <th scope="col">Actualización</th>
      <th scope="col">Autorizado por</th>
      <th scope="col">Baja</th>
      <th scope="col">Actualizar</th>
    
    </tr>
  </thead>
  <tbody>
    
        
        <?php
        // echo"<pre>";        
        // print_r($ResEmpleados->fetch_assoc());
        // echo"</pre>";
    while ($row=$ResDepaTodo->fetch_assoc()) {
        echo"<tr scope='row'>";
      
         echo "<th scope='row'>".$row['idDepartamento']."</th>";
         echo "<th scope='row'>".$row['Nombre']."</th>";
         echo "<th scope='row'>".$row['IdAutorizador']."</th>";
         echo "<th scope='row'>".$row['Activo']."</th>";
         echo "<th scope='row'>".$row['Creación']."</th>";
         echo "<th scope='row'>".$row['Actualización']."</th>";
         echo "<th scope='row'>".$row['PersonalActualiza']."</th>";
         if($row['Activo'] == 1){
            echo "<td><a type='button' id='jsBtnBaja' class='btn btn-outline-danger' href='BajaDepartamento.php?id=".$row['idDepartamento']."'>Baja</a></td>";
         }else{
            echo "<td><a type='button' id='jsBtnBaja' class='btn btn-outline-success' href='AltaDepartamento.php?id=".$row['idDepartamento']."'>Alta</a></td>";
         }
         echo "<td><a type='button' class='btn btn-outline-info' href='ActualizarDepartamento.php?id=".$row['idDepartamento']."'>Actualizar</a></td>";
         echo"</tr>";

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

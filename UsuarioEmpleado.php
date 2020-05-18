
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
        $table = 'usuario';
        $col = "idCuenta";
        $val = $_GET['id'];
        $UserEm = new DBC;
        $ResUserEm = $UserEm ->ImprimirTodoDonde($table, $col, $val);


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
    <title>UsuarioEmpleado</title>
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
        <?php
    while ($row=$ResUserEm->fetch_assoc()) {
    echo"<h3>Información del usuario \"".$row['usuario']."\"</h3>
    

    <br>
    <table class='table tab'>
<thead class='thead-dark'>
<tr>
  <th scope='col'>Id</th>
  <th scope='col'>Usuario</th>
  <th scope='col'>Contra</th>
  <th scope='col'>Actualizar</th>
</tr>
</thead>
<tbody>
";
 

    echo"<tr scope='row'>";
     echo "<th scope='row'>".$row['idCuenta']."</th>";
     echo "<th scope='row'>".$row['usuario']."</th>";
     echo "<th scope='row'>".$row['Contra']."</th>";
     echo "<td><a type='button' class='btn btn-outline-info' href='ActualizarUsuario.php?id=".$row['idCuenta']."'>Actualizar</a></td>";
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

?>
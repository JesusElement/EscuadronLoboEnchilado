<?php
    session_start(); 
    if(isset($_SESSION['Sesion'])){
        if ($_SESSION['Sesion'] == 'On') {
            include('php/Clases.php');
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
        <title>Bienvenido</title>
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
        <?php
        $table = "empleados";
        $Imprimir = new DBC;
        $ResImprimir = $Imprimir->ImprimirTodo($table)
            
			// $Imprimir = new DBC;
			// $ResImprimir = $Imprimir->ImprimirTodo($Tab);

        ?>
    </div>
    <div class="footer">
        <?php 
        include('Componentes/Footer.php');
        ?>
    </div>
</div>

    </body>
</html>

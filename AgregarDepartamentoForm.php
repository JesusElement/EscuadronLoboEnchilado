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
                            <label for="inputEmail4">Departamento</label>
                            <input type="text" name="nombreDForm" class="form-control" id="nom" required>
                        </div>
                    </div>
                    <div class="form-row">

                        <label class="mr-sm-2 sr-only">¿Quien autoriza en este departamento?</label>
                        <select class="custom-select mr-sm-2" name="JefeDForm" id="inlineFormCustomSelect">
                            <option selected disabled>Jefe</option>
                            <?php
        	while ($row=$ResJefeID->fetch_assoc()) {
               echo"<option value='".$row['idJefe']."'>".$row['Nombre']."</option>";
               
             }
     ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="activo"  aria-label="Radio button for following text input">
                                </div>
                            </div>
                            <input type="text" class="form-control" value="¿Ya esta activo?" disabled aria-label="Text input with radio button">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Fecha de ingreso</label>
                            <input type="date" name="fecha" class="form-control" id="datepicker" required>
                        </div>
                    </div>
                    <br>

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
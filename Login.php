<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
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
            <div class="LoginCss">
                <form action="php/loginP.php" method="POST" id="formLogin">
                    <div class="form-group">
                        <label class="small mb-1">Usuario</label>
                        <input class="form-control py-4"  name="Usuario" type="text" placeholder="Pon tu usuario" />
                    </div>
                    <div class="form-group">
                    <label class="small mb-1" for="inputPassword">Password</label>
                    <input class="form-control py-4" name="Password" type="password" placeholder="Pon tu password" />
                     </div>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button type="submit" class="btn btn-dark" form="formLogin">Accesar</button>
                    </div>
                </form>
                <div class="loginMensajesCss">
                    <?php
  
  if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 1) {
        echo"Inicia sesión";
    }else if ($error==2) {
        echo"Vuelve pronto";
    }elseif ($error==3) {
        echo"Revisa tu nombre de usuario";
    }elseif ($error==4) {
        echo"Contraseña incorrecta";
    }elseif ($error==6) {
        echo"Por favor, ingrese sus datos.";
    }elseif ($error==7){
        echo"Estas Inactivo";
    }
}else{
        echo"<p>Buenas noches</p>";
}


?>
                
            </div>
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
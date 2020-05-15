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
                <form action="">
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Usuario</label><input class="form-control py-4" id="inputEmailAddress" type="text" placeholder="Pon tu usuario" />
                    </div>
                    <div class="form-group">
                    <label class="small mb-1" for="inputPassword">Password</label>
                    <input class="form-control py-4" id="inputPassword" type="password" placeholder="Pon tu password" />
                     </div>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="btn btn-primary" href="index.html">Accesa</a>
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
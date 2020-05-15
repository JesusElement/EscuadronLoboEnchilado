
<?php 

define("DB_HOST", "localhost");
define("DB_NAME", "costos");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_ENCODE", "utf8");

$conexion = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME);
mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

if(mysqli_connect_errno()){
	printf("Falló la conexión a la base de datos: %s\n",
mysqli_connect_errno());
	exit();
}


?>


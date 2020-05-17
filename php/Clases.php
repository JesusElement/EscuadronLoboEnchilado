<?php


/* -------------------------------------------------------------------------- */
/*                    Esto es para poner nuestras funciones                   */
/* -------------------------------------------------------------------------- */

 class DBC{

     function Conecta(){
        // define("DB_HOST", "localhost");
        //  define("DB_NAME", "costos");
        //  define("DB_USERNAME", "root");
        //  define("DB_PASSWORD", "");
        //  define("DB_ENCODE", "utf8");
         
        $DB_HOST = "localhost";
        $DB_NAME = "costos";
        $DB_USERNAME = "root";
        $DB_PASSWORD = "";
        $DB_ENCODE = "utf8";

         $conexion = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
         mysqli_query($conexion, 'SET NAMES "'.$DB_ENCODE.'"');
         
         if(mysqli_connect_errno()){
         	printf("Falló la conexión a la base de datos: %s\n",
         mysqli_connect_errno());
         	exit();
         }
     
       return $conexion;
    }
    
    


  
    function ImprimirTodo($table){

        $conex = new DBC;
        $conexion =$conex ->Conecta();
        
        $sql = "SELECT * FROM $table;"; 
        $Res = $conexion ->query($sql);  
        if ($Res===false) {
            trigger_error('Error, favor de reportarlo: '.$sql.'Error:'.$conexion->error, E_USER_ERROR);
        } else {
            $Res->data_seek(0);
        
            // echo "<pre>";
            //  print_r($row=$Res->fetch_array(MYSQLI_NUM));
            // echo "</pre>";
            // print_r($row[1]);
            // $row=$Res->fetch_array(MYSQLI_NUM);
            $conexion = null;
            return $Res;
    }

  }

      function jefeIdNom(){
    
        $conex = new DBC;
        $conexion =$conex ->Conecta();

      
        $sql = "SELECT j.idJefe, em.Nombre  FROM jefes as j INNER JOIN empleados as em on em.idEmpleados = j.idEmpleadoJ";
        $Res = $conexion ->query($sql);  
        if ($Res===false) {
            trigger_error('Error, favor de reportarlo: '.$sql.'Error:'.$conexion->error, E_USER_ERROR);
        } else {
             //echo "<pre>";
             // print_r($row=$Res->fetch_array(MYSQLI_NUM));
             //echo "</pre>";
             //print_r($row[1]);
            // $row=$Res->fetch_array(MYSQLI_NUM);
            $conexion = null;
            return $Res;
            
            exit();
        }
        $conexion = null;
  }

    function departamentoNom(){
        $conex = new DBC;
        $conexion =$conex ->Conecta();

        $sql = "SELECT idDepartamento, Nombre FROM departamento GROUP by idDepartamento";

        $Res = $conexion ->query($sql);  
        if ($Res===false) {
            trigger_error('Error, favor de reportarlo: '.$sql.'Error:'.$conexion->error, E_USER_ERROR);
        } else {
             //echo "<pre>";
             // print_r($row=$Res->fetch_array(MYSQLI_NUM));
             //echo "</pre>";
             //print_r($row[1]);
            // $row=$Res->fetch_array(MYSQLI_NUM);
            $conexion = null;
            return $Res;
           
            exit();
        }
        $conexion = null;
    }

    function RangoSelect(){
        $conex = new DBC;
        $conexion =$conex ->Conecta();

        $sql = "SELECT DISTINCT tipo from rango_empleado";

        $Res = $conexion ->query($sql);  
        if ($Res===false) {
            trigger_error('Error, favor de reportarlo: '.$sql.'Error:'.$conexion->error, E_USER_ERROR);
        } else {
             //echo "<pre>";
             // print_r($row=$Res->fetch_array(MYSQLI_NUM));
             //echo "</pre>";
             //print_r($row[1]);
            // $row=$Res->fetch_array(MYSQLI_NUM);
            $conexion = null;
            return $Res;
           
            exit();
        }
        $conexion = null;
    }

/* ---------------------------- InsertPara8datos ---------------------------- */

    function InsertaOchoDatos($table,$col_q,$col_w,$col_e,$col_r,$col_t,$col_y,$col_u,$col_i,$val_a,$val_b,$val_c,$val_d,$val_e,$val_f,$val_g,$val_h){
        $conex = new DBC;
        $conexion =$conex ->Conecta();

        $sql = "
        INSERT INTO $table 
        ($col_q,
         $col_w,
         $col_e,
         $col_r,
         $col_t,
         $col_y,
         $col_u,
         $col_i
         ) 
        
        VALUES (
            '$val_a',
            '$val_b',
            '$val_c',
            '$val_d',
            '$val_e',
            '$val_f',
            '$val_g',
            '$val_h'
        
            )
        ";

        $Res = $conexion ->query($sql);  
        if ($Res===false) {
            trigger_error('Error, favor de reportarlo: '.$sql.'Error:'.$conexion->error, E_USER_ERROR);
        } else { 
            $Res = "y";
            return $Res;
            exit();
        }
       
    }

/* --------------------------- INSER para 7 datos --------------------------- */

function InsertaSieteDatos($table,$col_q,$col_w,$col_e,$col_r,$col_t,$col_y,$col_u,$val_a,$val_b,$val_c,$val_d,$val_e,$val_f,$val_g){
    $conex = new DBC;
    $conexion =$conex ->Conecta();

    $sql = "
    INSERT INTO $table 
    ($col_q,
     $col_w,
     $col_e,
     $col_r,
     $col_t,
     $col_y,
     $col_u,
     ) 
    
    VALUES (
        '$val_a',
        '$val_b',
        '$val_c',
        '$val_d',
        '$val_e',
        '$val_f',
        '$val_g',
        )
    ";

    $Res = $conexion ->query($sql);  
    if ($Res===false) {
        trigger_error('Error, favor de reportarlo: '.$sql.'Error:'.$conexion->error, E_USER_ERROR);
    } else { 
        $Res = "y";
        return $Res;
        exit();
    }
   
}

/* ---------------------------- INSERT DE 3 DATOS --------------------------- */
function InsertaTresDatos($table,$col_q,$col_w,$col_e,$val_a,$val_b,$val_c){
    $conex = new DBC;
    $conexion =$conex ->Conecta();

    $sql = "
    INSERT INTO $table 
    ($col_q,
     $col_w,
     $col_e
     ) 
    
    VALUES (
        '$val_a',
        '$val_b',
        '$val_c'
        )
    ";

    $Res = $conexion ->query($sql);  
    if ($Res===false) {
        trigger_error('Error, favor de reportarlo: '.$sql.'Error:'.$conexion->error, E_USER_ERROR);
    } else { 
        $Res = "y";
        return $Res;
        exit();
    }
   
}

/* --------------------------- INSERT de dos datos -------------------------- */
function InsertaDosDatos($table,$col_q,$col_w,$val_a,$val_b){
    $conex = new DBC;
    $conexion =$conex ->Conecta();

    $sql = "
    INSERT INTO $table 
    ($col_q,
     $col_w
     ) 
    
    VALUES (
        '$val_a',
        '$val_b'
        )
    ";

    $Res = $conexion ->query($sql);  
    if ($Res===false) {
        trigger_error('Error, favor de reportarlo: '.$sql.'Error:'.$conexion->error, E_USER_ERROR);
    } else { 
        $Res = "y";
        return $Res;
        exit();
    }
   
}


/* ---------------------------- INSER de un Dato ---------------------------- */
function InsertaUnoDatos($table,$col_q,$val_a){
    $conex = new DBC;
    $conexion =$conex ->Conecta();

    $sql = "
    INSERT INTO $table 
    ($col_q) 
    VALUES ('$val_a')
    ";

    $Res = $conexion ->query($sql);  
    if ($Res===false) {
        trigger_error('Error, favor de reportarlo: '.$sql.'Error:'.$conexion->error, E_USER_ERROR);
    } else { 
        $Res = "y";
        return $Res;
        exit();
    }
   
}

    
    

}

?>
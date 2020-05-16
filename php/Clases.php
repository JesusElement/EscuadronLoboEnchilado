<?php


/* -------------------------------------------------------------------------- */
/*                    Esto es para poner nuestras funciones                   */
/* -------------------------------------------------------------------------- */

 class DBC{

  private function Conecta(){
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
     
       return $conexion;
    }
   
    // function CerrarDB($conexion){
    //     $Cerrado =mysqli_close($conexion) or die ();
    //     if(isset($Cerrado))
    //     {}else{echo"<br>Base de datos aun en linea";}
    //     return $Cerrado;
    // }


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

      
        $sql = "SELECT em.Nombre, j.idJefe FROM  empleados as em INNER JOIN jefes as j on em.idJefe = j.idEmpleadoJ";
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



}

?>

<?php

require_once "conexion.php";
    class mdlUsaurios
    {
        static public function mdlMostrarUsuarios($tabla){

            $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();

            return $stmt -> fetchAll();

            //$stmt->close();

            $stmt = null;
        }
         static public function mdlguardarUsuarios(){
            
         }

    }
    
?>
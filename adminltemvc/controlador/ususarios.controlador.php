<?php

    class ctrUsuarios{
        static public function ctrMostrarUsuarios(){
            $tabla= "usuario";
            $respuesta = mdlUsaurios :: mdlMostrarUsuarios($tabla);

            return $respuesta;
        }
    }
?>
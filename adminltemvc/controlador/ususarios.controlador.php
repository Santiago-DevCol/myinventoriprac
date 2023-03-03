<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    class ctrUsuarios{
        static public function ctrMostrarUsuarios(){
            $tabla= "usuario";
            $respuesta = mdlUsaurios :: mdlMostrarUsuarios($tabla);

            return $respuesta;
        }
        static public function ctrGuardarusuarios(){
            if (isset($_POST["nom_usuarios"])) {
                if(isset($_FILES["subirImgusuarios"]["tmp_name"]) && !empty($_FILES["subirImgusuarios"]["tmp_name"])){
                    list($ancho,$alto)=getimagesize($_FILES["subirImgusuarios"]["tmp_name"]);
                    $nuevoAncho = 480;
                    $nuevoAlto = 382;
                    /* Creamos el directorio para guar dar la foto de perfil*/
                    $directorio = "vistas/imagenes/usuarios";
                    /*De acuerdo al  tipó de imagen se aplica funciones de PHP*/
                    if ($_FILES["subirImgusuarios"]["type"] == "image/jpeg") {
                        $aleatorio = mt_rand(100,999);
                        $ruta = $directorio . "/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["subirImgusuarios"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    } else if ($_FILES["subirImgusuarios"]["type"] == "image/png") {
                        $aleatorio = mt_rand(100,999);
                        $ruta = $directorio . "/" . $aleatorio . ".png";
                        $origen = imagecreatefromjpeg($_FILES["subirImgusuarios"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);
                        imagealphablending($destino,FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    } else {
                        echo '
                            <script>
                            swal({
                                type: "error",
                                title: "¡CORREGIR!",
                                text: "No se permiten formatos diferentes a JPG o PNG",
                                showConfirmButton: true,
                                ConfirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    history.back();
                                }
                            });
                            </script>
                        ';
                        return;
                    }
                    $encriptarPassword = crypt($_POST["pass_user"], '$2a$07$usesomesillystringforsalt$');

                    $datos = array( "nom_usuario"=>$_POST["nom_usuarios"],
                                    "nom_user"=>$_POST["nom_user"],
                                    "pass_user"=>$encriptarPassword,
                                    "rol_user"=> $_POST["rol_user"],
                                    "foto"=>$ruta);
                    $tabla = "usuarios";
                    $respuesta = mdlUsaurios::mdlguardarUsuarios($tabla,$datos);
                    
                    
                }
            }
        }
    }
?>
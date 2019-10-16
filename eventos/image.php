<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    session_start();
    chdir('..');

    header('Content-Type: text/html; charset=utf-8');
    include_once('config.php');
    include_once('lib/BddMySql.php');
    include_once("lib/Usuario.php");
    include_once("lib/GenerarImagenes.php");
    include_once("controllers/admin/Administrador.php");
    include_once("model/Evento.php");
    $admin = new Administrador();
    //detectar si hubo se subio un archivo
    if(!isset($_FILES["afiche"])){
        http_response_code(404);
        exit(0);
    }
    //detectar si es una imagen
    $archivo = $_FILES["afiche"];
    if(($archivo["type"] != "image/jpeg")&&($archivo["type"] != "image/png")){
        http_response_code(404);
        exit(0);
    }
    //generar las imagenes
    $fileName = "img/eventos/".$archivo["size"].$archivo["name"];
    $archivos = array();
    $archivos["urlAfiche"] = $fileName;
    move_uploaded_file($archivo["tmp_name"],$fileName);
    $nuevaImagen = new ImagenEventoRedimensionada($fileName);
    $archivos["urlThumbnail"] = $nuevaImagen->generarImagenThumb();
    $archivos["urlImagenHome"] = $nuevaImagen->generarImagenHome();
    //actualizar la base de datos


    //enviar los nombres de los 3 archivos generados
    echo json_encode($archivos, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    /*
    if(!$_POST["jsondata"]){
        http_response_code(404);
        exit(0);
    }

    $evento = json_decode($_POST["jsondata"],true);
    if(!$evento){
        http_response_code(404);
        exit(0);
    }
    if(!isset($evento["idevento"])){
        http_response_code(404);
        exit(0);
    }
    $id = $evento["idevento"];
    */

    //$admin->actualizarEvento($id,$param);


 ?>

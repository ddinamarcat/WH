<?php
    session_start();
    chdir('..');

    error_reporting(E_ALL);
    ini_set('display_errors',1);
    header('Content-Type: text/html; charset=utf-8');
    include_once('config.php');
    include_once('lib/BddMySql.php');
    include_once("lib/Usuario.php");
    include_once("controllers/admin/Administrador.php");
    include_once("model/Noticia.php");
    $admin = new Administrador();
    if(!$_POST["jsondata"]){
        http_response_code(404);
        exit(0);
    }
    var_dump($_POST["jsondata"]);
    $string = $_POST["jsondata"];
//    $string = preg_replace("/[\r\n]+/", "&#13;&#10;", $string);
    $noticia = json_decode($string,true);
    if(!$noticia){
        http_response_code(404);
        exit(0);
    }//'titulo', 'descripcion', 'idusuario', 'fechapublicacion','urlafiche','urlthumbnail','urlimagenhome','destacado','estado'
    if(!isset($noticia["fechaPublicacion"])||!isset($_SESSION["id"])||!isset($noticia["idnoticia"])||!isset($noticia["urlThumbnail"])||!isset($noticia["urlImagenHome"])||!isset($noticia["urlAfiche"])||!isset($noticia["titulo"])||!isset($noticia["descripcion"])||!isset($noticia["destacado"])||!isset($noticia["estado"])){
        http_response_code(404);
        exit(0);
    }
    $id = $noticia["idnoticia"];
    //'titulo', 'descripcion', 'idusuario', 'fechapublicacion','urlafiche','urlthumbnail','urlimagenhome','destacado','estado'
    $param = array();
    $param[] = $noticia["titulo"];
    $param[] = $noticia["descripcion"];
    $param[] = $_SESSION["id"];
    $param[] = $noticia["fechaPublicacion"];
    $param[] = $noticia["urlAfiche"];
    $param[] = $noticia["urlThumbnail"];
    $param[] = $noticia["urlImagenHome"];
    $param[] = $noticia["destacado"];
    $param[] = $noticia["estado"];

    $r = $admin->actualizarNoticia($id,$param);

 ?>

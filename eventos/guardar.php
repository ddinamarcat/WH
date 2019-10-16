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
    include_once("model/Evento.php");
    $admin = new Administrador();
    if(!$_POST["jsondata"]){
        http_response_code(404);
        exit(0);
    }
    $evento = json_decode($_POST["jsondata"],true);
    if(!$evento){
        http_response_code(404);
        exit(0);
    }
    if(!isset($evento["idevento"])||!isset($evento["urlThumbnail"])||!isset($evento["urlImagenHome"])||!isset($evento["urlAfiche"])||!isset($evento["inicio"])||!isset($evento["fin"])||!isset($evento["titulo"])||!isset($evento["descripcion"])||!isset($evento["participantes"])||!isset($evento["urlinscripcion"])||!isset($evento["idioma"])||!isset($evento["cupos"])||!isset($evento["organizado"])||!isset($evento["lugar"])||!isset($evento["valor"])||!isset($evento["estado"])||!isset($evento["destacado"])){
        http_response_code(404);
        exit(0);
    }
    $id = $evento["idevento"];

    $param = array();
    $param[] = $evento["inicio"];
    $param[] = $evento["fin"];
    $param[] = $evento["titulo"];
    $param[] = $evento["descripcion"];
    $param[] = $evento["participantes"];
    $param[] = $evento["urlinscripcion"];
    $param[] = $evento["idioma"];
    $param[] = $evento["valor"];
    $param[] = $evento["cupos"];
    $param[] = $evento["organizado"];
    $param[] = $evento["lugar"];
    $param[] = $evento["estado"];
    $param[] = $evento["urlAfiche"];
    $param[] = $evento["urlThumbnail"];
    $param[] = $evento["urlImagenHome"];
    $param[] = $evento["destacado"];
    var_dump($param);

    $admin->actualizarEvento($id,$param);
        //$campos = array('inicio', 'fin', 'titulo', 'descripcion', 'participantes', 'urlinscripcion', 'idioma', 'precio', 'cupos','organizado','lugar');
        //echo $_POST["jsondata"];


 ?>

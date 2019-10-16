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
    if(!isset($evento["id"])){
        http_response_code(404);
        exit(0);
    }
    $id = $evento["id"];
    $r = $admin->borrarEvento($id);
    var_dump($r);

 ?>

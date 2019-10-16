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
    $noticia = json_decode($_POST["jsondata"],true);
    if(!$noticia){
        http_response_code(404);
        exit(0);
    }
    if(!isset($noticia["id"])){
        http_response_code(404);
        exit(0);
    }
    $id = $noticia["id"];
    $r = $admin->borrarNoticia($id);
    var_dump($r);

 ?>

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
    if(!isset($evento["titulo"])||!isset($evento["descripcion"])){
        http_response_code(404);
        exit(0);
    }

    $param = array();
    $param[] = $evento["titulo"];
    $param[] = $evento["descripcion"];

    $id = $admin->insertarEvento($param);
    //var_dump($id[0]);
    $retorno= array("id" => null);
    if($id){
        $retorno = array("id" => $id[0][0]);
    }
    echo json_encode($retorno);
        //$campos = array('inicio', 'fin', 'titulo', 'descripcion', 'participantes', 'urlinscripcion', 'idioma', 'precio', 'cupos','organizado','lugar');
        //echo $_POST["jsondata"];


 ?>

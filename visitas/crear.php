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
    $visita = json_decode($_POST["jsondata"],true);
    var_dump($visita);
    if(!$visita){
        http_response_code(404);
        exit(0);
    }
    if(!isset($visita["nombre"])||!isset($visita["email"])||!isset($visita["asunto"])){
        http_response_code(404);
        exit(0);
    }
    if(isset($_SESSION["uidvisita"])){
        http_response_code(300);
        exit(0);
    }
    $param = array();
    $param[] = $visita["nombre"];
    $param[] = $visita["email"];
    $param[] = $visita["asunto"];

    $id = $admin->insertarVisita($param);

    $retorno= array("id" => null);
    if($id){
        $_SESSION["uidvisita"] = uniqid();
        $retorno = array("id" => $id[0][0]);
    }
    echo json_encode($retorno);

 ?>

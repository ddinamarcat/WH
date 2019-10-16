<?php

error_reporting(E_ALL);
ini_set('display_errors',1);
include_once("lib/GenerarImagenes.php");


 //Crea imagenes para thumbnail en la seccion eventos y para la seccion del HRTime\PerformanceCounter

$imagen = new ImagenRedimensionada("img/eventos/arduino.png");
$imagen2 = new ImagenRedimensionada("img/eventos/atoz.png");
$imagen3 = new ImagenRedimensionada("img/eventos/bb2.png");
$imagen4 = new ImagenRedimensionada("img/eventos/coworksur.png");
$imagen5 = new ImagenRedimensionada("img/eventos/designthinking.png");
$imagen6 = new ImagenRedimensionada("img/eventos/dmhs.png");
$imagen7 = new ImagenRedimensionada("img/eventos/metodologiasagiles.png");
$imagen8 = new ImagenRedimensionada("img/eventos/propintelectual.png");
$imagen9 = new ImagenRedimensionada("img/eventos/stw.png");
$imagen10 = new ImagenRedimensionada("img/eventos/trevor.png");
$imagen11 = new ImagenRedimensionada("img/eventos/bbfs.png");
$imagen->generarImagenHome();
$imagen2->generarImagenHome();
$imagen3->generarImagenHome();
$imagen4->generarImagenHome();
$imagen5->generarImagenHome();
$imagen6->generarImagenHome();
$imagen7->generarImagenHome();
$imagen8->generarImagenHome();
$imagen9->generarImagenHome();
$imagen10->generarImagenHome();
$imagen11->generarImagenHome();

print "Se generaron las imagenes";




?>

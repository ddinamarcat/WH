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
    if(!$_GET["id"]){
        http_response_code(404);
        exit(0);
    }

    $datos = $admin->getEvento($_GET["id"]);

    $evento = new Evento();
    $et = $datos[0];
    $evento->id = $et[0];
    $evento->inicio = $et[1];
    $evento->fin = $et[2];
    $evento->urlImagenHome = $et[3];
    $evento->urlThumbnail = $et[4];
    $evento->urlAfiche = $et[5];
    $evento->titulo = $et[6];
    $evento->descripcion = $et[7];
    $evento->participantes = $et[8];
    $evento->urlInscripcion = $et[9];
    $evento->idioma = $et[10];
    $evento->precio = $et[11];
    $evento->cupos = $et[12];
    $evento->organizado = $et[13];
    $evento->destacado = $et[14];
    $evento->lugar = $et[15];
    $evento->estado = $et[16];
    $_SESSION["loadArticle"] = json_encode($evento, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    $_SESSION["articleType"] = "evento";

?>
<html>
<head>
	<title><?php echo $datos[0][1]; ?></title>
    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
	<meta property="og:url"           content="http://www.jaimefortega.com/eventos/?id=<?php echo $_GET["id"]; ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="<?php echo $evento->titulo; ?>" />
	<meta property="og:description"   content="<?php echo $evento->descripcion; ?>" />
	<meta property="og:image"         content="<?php echo "http://www.jaimefortega.com/".$evento->urlImagenHome; ?>" />
</head>
<script>
    window.location.href = "http://www.jaimefortega.com/#eventos";
</script>
<body>
</body>
</html>

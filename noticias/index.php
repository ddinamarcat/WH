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
    if(!$_GET["id"]){
        http_response_code(404);
        exit(0);
    }

    $datos = $admin->getNoticia($_GET["id"]);

    $noticia = new Noticia();
    $nt = $datos[0];

    $noticia->id = $nt[0];
    $noticia->titulo = $nt[1];
    $noticia->descripcion = $nt[2];
    $noticia->idUsuario = $nt[3];
    $noticia->fechaPublicacion = $nt[4];
    $noticia->urlImagenHome = $nt[5];
    $noticia->urlThumbnail = $nt[6];
    $noticia->urlAfiche = $nt[7];
    $noticia->destacado = $nt[8];
    $noticia->estado = $nt[9];
    $_SESSION["loadArticle"] = json_encode($noticia, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    $_SESSION["articleType"] = "noticia";

?>
<html>
<head>
	<title><?php echo $datos[0][1]; ?></title>
    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
	<meta property="og:url"           content="http://www.jaimefortega.com/noticias/?id=<?php echo $_GET["id"]; ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="<?php echo $noticia->titulo; ?>" />
	<meta property="og:description"   content="<?php echo $noticia->descripcion; ?>" />
	<meta property="og:image"         content="<?php echo "http://www.jaimefortega.com/".$noticia->urlImagenHome; ?>" />
</head>
<script>
    window.location.href = "http://www.jaimefortega.com/#noticias";
</script>
<body>
</body>
</html>

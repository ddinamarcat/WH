<!-- Sitio web desarrollado por Ecstatic Coders -->
<!--       Daniel Dinamarca y Jaime Ortega      -->
<?php
include_once('model/Evento.php');
include_once('model/Noticia.php');
$listaDeNoticias = Noticia::generarJsonDeListaDeNoticias();
$listaDeEventos = Evento::generarJsonDeListaDeEventos();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Working House - Espacio de Co-work</title>
    <!-- Favicon -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
	<!-- jQuery min 2.2.1 -->
	<script src="js/jquery.min.js"></script>
	<!-- Vista para dispositivos moviles -->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<!-- Codificacion usada -->
    <meta charset="utf-8"/>
	<meta http-equiv="Content-Type" content="text/html"/>
	<!-- Script para volver arriba -->
	<script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
	<!-- Script para cargar context Manager -->
	<script type="text/javascript" src="js/contextManager.js"></script>
    <script type="text/javascript" src="js/invitado.js"></script>
    <script type="text/javascript" src="js/validator.js"></script>
    <!-- Script para cargar context Manager acercade-->
    <script type="text/javascript" src="js/acercade.js"></script>
    <!-- Script para limitar movimiento del calendario de eventos-->
    <script type="text/javascript" src="js/calendarioManager.js"></script>
    <script type="text/javascript" src="js/eventosManager.js"></script>
	<script type="text/javascript" src="js/noticiasManager.js"></script>
    <script type="text/javascript" src="js/loginManager.js"></script>
    <script type="text/javascript" src="js/rest.js"></script>

    <!-- Script para generar ventana modal para eventos y noticias -->
    <script type="text/javascript" src="js/modalManager.js"></script>
    <script type="text/javascript" src="js/FormManager.js"></script>
    <script type="text/javascript" src="js/ArticleSlide.js"></script>

	<script type="text/javascript">
    //if(document.origin != "http://www.workinghouse.cl") document.location.href = "http://www.workinghouse.cl";
    var contextManager = null;
    var loginForm = document.createElement("div");
	var eventos = JSON.parse(decodeURI('<?php echo $listaDeEventos; ?>'));
	var noticias = JSON.parse(decodeURI('<?php echo $listaDeNoticias; ?>'));
    var articleToLoad = document.createElement("div");
	jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},9000);
			});
            $().UItoTop({ easingType: 'easeOutQuart' });//para flecha de vuelta hacia arriba
			contextManager = new ContextManager("contenido");
            var tempform = document.importNode(document.getElementById("login-form").content,true);
            loginForm.appendChild(tempform);
            var suscripcion = document.getElementById("form-suscripcion");
            var tSuscripcion = document.getElementById("template-suscribir");
            var contenedor = document.createElement("div");
            contenedor.appendChild(document.importNode(tSuscripcion.content,true));
            suscripcion.innerHTML = contenedor.innerHTML;
            var form = contenedor.querySelector("form");
            form.addEventListener("onkeyup",function(event){event.preventDefault();});
            form.addEventListener("onkeydown",function(event){event.preventDefault();});
            form.addEventListener("onkeypress",function(event){event.preventDefault();});
    <?php   if(isset($_SESSION["loadArticle"])){
                if($_SESSION["articleType"] == "evento"){
                    if($_SESSION["loadArticle"] != ""){?>
                        var artId = JSON.parse(decodeURI('<?php echo $_SESSION["loadArticle"]; ?>'));
                        articleToLoad.attributes.ev = artId;
                        eventosManager.generarEventoModal(articleToLoad);
                        modalManager.showModal();
    <?php
                    }
                }
                else{ ?>
                    var artId = JSON.parse(decodeURI('<?php echo $_SESSION["loadArticle"]; ?>'));
                    articleToLoad.attributes.ev = artId;
                    noticiasManager.generarNoticiaModal(articleToLoad);
                    modalManager.showModal();
    <?php
                }
                $_SESSION["loadArticle"] = "";
            } ?>

	});
    function menuHandler(){
        var menucl = document.getElementById("top-menu").classList;
        if (menucl.contains("menum-inactivo")){
            menucl.remove("menum-inactivo");
            menucl.add("menum-activo");
        } else{
            menucl.remove("menum-activo");
            menucl.add("menum-inactivo");
        }
    }
	</script>
	<!-- Hoja estilo Layout1 -->
    <script type="text/javascript" src="js/responsive.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfpskztChudN2xHnRMht130eJ96qXB1ZE"></script>

    <script type="text/javascript">

        function init() {
            var mapOptions = {
                zoom: 17,
                center: new google.maps.LatLng(-36.827701285930186, -73.04263844953206),

                styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
            };

            var mapElement = document.getElementById('map');

            var map = new google.maps.Map(mapElement, mapOptions);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(-36.827701285930186, -73.04263844953206),
                map: map,
                icon:'img/google-map-marker.png',
                title: 'Working House'
            });
            return mapElement;
        }
    </script>
</head>
<body onscroll="calendarioManager.mueveCalendario()">
<header>
    <div id="header-grid">
        <div>
            <a href="#principal" class="main-menu-element" templateId="principal" mark="0"><img id="logo" src="img/wh_logo.svg" alt="Working House Logo"/></a>
        </div>
        <div class="menu-mobile">
            <span class="menu"><img src="img/nav.svg" alt="" onclick="menuHandler()"/></span>
        </div>
        <div>
            <nav id="top-menu" class="menum-inactivo" >
                <ul id="botones-menu-principal">
                    <li class="no-actual main-menu-element" templateId="acercade" mark="1">
                        <a href="#">Acerca de</a>
                    </li>
                    <li class="no-actual main-menu-element" templateId="membresia" mark="1">
                        <a href="#">Membres&iacute;as</a>
                    </li>
                    <li class="no-actual main-menu-element" templateId="eventos" mark="1">
                        <a href="#">Eventos</a>
                    </li>
                    <li class="no-actual main-menu-element" templateId="comunidad" mark="1">
                        <a href="#">Comunidad</a>
                    </li>
                    <li class="no-actual main-menu-element" templateId="startupchile" mark="1">
                        <a href="#">Start-up Chile</a>
                    </li>
    				<li class="no-actual main-menu-element" templateId="noticias" mark="1">
                        <a href="#">Noticias</a>
                    </li>
                    <li class="no-actual main-menu-element" templateId="visita" mark="1">
                        <a href="#">Vis&iacute;tanos</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div>
            <input id="login-button" type="button" Value="LOGIN" onclick="loginManager.showLogin();"/>
        </div>
    </div>
</header>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '536271573164276',
      xfbml      : true,
      version    : 'v2.8'
    });
	FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="contenido" class="c-desactivado">
</div>
<template id="principal">
	<?php include_once("principal.php"); ?>
</template>
<template id="membresia">
	<?php include_once("membresia.php"); ?>
</template>
<template id="acercade">
    <?php include_once("acercade.php"); ?>
</template>
<template id="eventos">
    <?php include_once("eventos.php"); ?>
</template>
<template id="comunidad">
    <?php include_once("comunidad.php"); ?>
</template>
<template id="startupchile">
    <?php include_once("startupchile.php"); ?>
</template>
<template id="noticias">
    <?php include_once("noticias.php"); ?>
</template>
<template id="visita">
    <?php include_once("visita.php"); ?>
</template>
<template id="login-form">
    <div class="login-container">
        <div class="input-login">
            <img src="img/wh_logo_negro.svg"/>
        </div>
        <form method="post" submitId="login-boton" onkeyup="validator.activateSubmit(this)" action="lib/LoginManager.php" class="login-f">
            <div class="input-login">
                <input name="user" placeholder="Ingrese su correo" type="text" autocomplete="off" validate="email" required/>
            </div>
            <div class="input-login">
                <input name="pass" placeholder="Ingrese su contraseña" type="password" autocomplete="off" validate="password" required/>
            </div>
            <div class="input-login">
                <button id="login-boton" class="boton-amarillo boton-login" type="submit" name="form-enviar" validate="submit" value="Submit" disabled>Enviar</button>
            </div>
        </form>
    <div>
</template>
<section id="modal-section" class="modal-hidden fadeout-modal hidden">
	<div id="modal-div">
        <img src="img/boton-cerrar.png" alt="Cerrar" class="boton-cerrar" onclick="modalManager.hideModal();"/>
		<div id="modal-content">
		</div>
	</div>
</section>
<footer>
    <section>
        <div>
            <div>
                <img id="logo-footer" src="img/wh_logo.svg" alt="Working House Logo"/>
                <p>Horario de atenci&oacute;n:</p>
                <p>Lunes - Viernes, 9:15 - 20:00 hrs</p>
                <p>Sábado previa reserva</p>
                <p>contacto@workinghouse.cl</p>
                <p>Orompello 178, Concepci&oacute;n, Regi&oacute;n del Bio-Bio, Chile, 4070123</p>
            </div>
    		<div id="form-suscripcion">

    		</div>
        </div>
    </section>
    <section>
		<div>
	        <div>
				<p>Todos los derechos reservados a @WORKINGHOUSE &nbsp;&nbsp;/&nbsp;&nbsp; Dise&ntilde;o y programaci&oacute;n @Chicotea @EcstaticCoders</p>
	        </div>
			<div>
				<div class="sm-icon yt-icon"><a href="https://www.youtube.com/channel/UCV72eJCkJ8C-x3FfrfSR-bQ" target="_blank"><img src="img/youtube_icon_after.svg" alt="Youtube"/></a></div>
				<div class="sm-icon fb-icon"><a href="https://www.facebook.com/workinghouseccp" target="_blank"><img src="img/fb_icon_after.svg" alt="Facebook"/></a></div>
				<div class="sm-icon tw-icon"><a href="https://twitter.com/workinghouseccp" target="_blank"><img src="img/twitter_icon_after.svg" alt="Twitter"/></a></div>
				<div class="sm-icon ig-icon"><a href="https://www.instagram.com/workinghouseccp/" target="_blank"><img src="img/instagram_icon_after.svg" alt="Instagram"/></a></div>
				<div class="sm-icon fc-icon"><a href="https://www.flickr.com/photos/129935616@N05/" target="_blank"><img src="img/flickr_icon_after.svg" alt="Flickr"/></a></div>
	        </div>
		</div>
    </section>
</footer>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<template id="template-suscribir">
    <form method="POST" submitId="suscribete" onkeyup="validator.activateSubmit(this)" action="suscriptores/crear.php" class="suscribete-form">
        <label for="suscribete">Suscr&iacute;bete a m&aacute;s info</label>
        <input type="text" validate="email" name="email" value="" autocomplete="off" class="editable campo-suscriptor" placeholder="Tu e-mail"/>
        <input type="hidden" name="prevent" value=""/>
        <button id="suscribete" type="button" name="enviar-suscripcion" validate="submit" value="Submit" onclick="FormManager.suscribir(this)" disabled>ENVIAR</button>
        <input id="suscribete" type="submit" style="display:none;" name="enviar-suscripcion" validate="submit" value="Submit" onclick="FormManager.suscribir(this)" disabled/>
    </form>
</template>
</body>
</html>

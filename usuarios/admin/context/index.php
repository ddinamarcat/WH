<!-- Sitio web desarrollado por Ecstatic Coders -->
<!--       Daniel Dinamarca y Jaime Ortega      -->
<!--       mail en agenda tu visita, sacar eventos actuales. hacer que los afiches en el home se vean centrados verticalmente.    -->
<?php
include_once('model/Evento.php');
include_once('model/Noticia.php');
include_once('model/Usuario.php');
$listaDeNoticias = Noticia::generarJsonDeListaDeNoticias();
$listaDeEventos = Evento::generarJsonDeListaDeEventos();
$listaDeUsuarios = UsuarioModel::generarJsonDeListaDeUsuarios();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Working House - &Aacute;rea de Administraci&oacute;n</title>
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
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="js/validator.js"></script>
    <!-- Script para cargar context Manager acercade-->
    <script type="text/javascript" src="js/acercade.js"></script>
    <!-- Script para limitar movimiento del calendario de eventos-->
    <script type="text/javascript" src="js/calendarioManager.js"></script>
    <script type="text/javascript" src="js/eventosManagerAdmin.js"></script>
	<script type="text/javascript" src="js/noticiasManagerAdmin.js"></script>
    <script type="text/javascript" src="js/loginManager.js"></script>
    <script type="text/javascript" src="js/rest.js"></script>

    <!-- Script para generar ventana modal para eventos y noticias -->
    <script type="text/javascript" src="js/modalManager.js"></script>
    <script type="text/javascript" src="js/FormManager.js"></script>
	<script type="text/javascript" src="js/userManager.js"></script>

	<script type="text/javascript">
    var contextManager = null;
	var eventos = JSON.parse(decodeURI('<?php echo $listaDeEventos; ?>'));
	var noticias = JSON.parse(decodeURI('<?php echo $listaDeNoticias; ?>'));
	var usuarios = JSON.parse(decodeURI('<?php echo $listaDeUsuarios; ?>'));
    var nombreUsuario = "<?php echo $_SESSION['nombre']; ?>";
    var apellidoUsuario = "<?php echo $_SESSION['apellido']; ?>";
	var userManager = new UserManager();
	jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},9000);
			});
            $().UItoTop({ easingType: 'easeOutQuart' });//para flecha de vuelta hacia arriba
			contextManager = new ContextManager("contenido");

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
</head>
<body onscroll="calendarioManager.mueveCalendario()">
<header>
    <div id="header-grid">
        <div>
            <a href="#principal" class="main-menu-element" templateId="principal" mark="0"><img id="logo" src="img/wh_logo.svg" alt="Working House Logo"/></a>
        </div>
        <div>
            <span class="menu"><img src="img/nav.svg" alt="" onclick="menuHandler()"/></span>
        </div>
        <div>
            <nav id="top-menu" class="menum-inactivo" >
                <ul id="botones-menu-principal">
                    <li class="no-actual main-menu-element" templateId="usuarios" mark="1">
                        <a href="#">Usuarios</a>
                    </li>
                    <li class="no-actual main-menu-element" templateId="eventos" mark="1">
                        <a href="#">Eventos</a>
                    </li>
    				<li class="no-actual main-menu-element" templateId="noticias" mark="1">
                        <a href="#">Noticias</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div>
            <input id="login-button" type="button" value="LOGOUT" onclick="loginManager.logout();"/>
        </div>
    </div>
</header>
<div id="contenido" class="c-desactivado">
</div>
<template id="principal">
	<?php include_once("principal.php"); ?>
</template>
<template id="usuarios">
    <?php include_once("usuarios.php"); ?>
</template>
<template id="eventos">
    <?php include_once("eventos.php"); ?>
</template>
<template id="noticias">
    <?php include_once("noticias.php"); ?>
</template>
<section id="modal-form" class="hidden">
    <div>
        <div>
            <p onclick="loginManager.hideLogin();">x</p>
        </div>
        <form class="basic-form login-form" method="post" submitId="login-boton" onkeyup="validator.activateSubmit(this)" action="lib/LoginManager.php">
            <div>
                <h2>&Aacute;rea de Ingreso de la Administraci&oacute;n</h2>
            </div>
            <div>
                <img src="img/incognito.png" alt="miembro"/>
            </div>
            <div>
                <input name="user" placeholder="Ingrese su correo" type="text" autocomplete="off" validate="email" required/>
            </div>
            <div>
                <input name="pass" placeholder="Ingrese su contraseña" type="password" autocomplete="off" validate="password" required/>
            </div>
            <div class="enviar-form">
                <button id="login-boton" type="submit" name="form-enviar" validate="submit" value="Submit" disabled>Enviar</button>
            </div>
        </form>
    </div>
</section>
<section id="modal-section" class="modal-hidden fadeout-modal hidden">
	<div id="modal-div">
        <img src="img/boton-cerrar.png" alt="Cerrar" class="boton-cerrar" onclick="modalManager.hideModal();"/>
		<div id="modal-content">
		</div>
	</div>
</section>
<section id="dialog-section" class="modal-hidden fadeout-modal hidden">
	<div id="dialog-div">
        <img src="img/boton-cerrar.png" alt="Cerrar" class="boton-cerrar" onclick="FormManager.hideDialog();"/>
		<div id="dialog-content">

		</div>
	</div>
</section>
<template id="dialogo-aceptar">
    <h4>¿De verdad desea eliminarlo?</h4>
    <section class="botones-dialogo">
        <button class="boton-aceptar">SI</button>
        <button class="boton-declinar">NO</button>
    </section>
</template>
<footer>
    <section>
        <div>
            <div>
                <img id="logo-footer" src="img/wh_logo.svg" alt="Working House Logo"/>
                <p>Horario de atenci&oacute;n:</p>
                <p>Lunes - Viernes, 9:15 - 20:00 hrs</p>
                <p>Sábado previa reserva</p>
                <p>Orompello 178, Concepci&oacute;n, Regi&oacute;n del Bio-Bio, Chile, 4070123</p>
            </div>
    		<div>
                <form method="post" submitId="suscribete" onkeyup="validator.activateSubmit(this)" class="suscribete-form">
        			<label for="suscribete"><span>SUSCR&Iacute;BETE</span> A M&Aacute;S INFO</label>
        			<input type="text" validate="email" name="suscribete" value="" placeholder="TU E-MAIL"/>
                    <button id="suscribete" type="submit" name="enviar-suscripcion" validate="submit" value="Submit" disabled>ENVIAR</button>
                </form>
    		</div>
        </div>
    </section>
    <section>
		<div>
	        <div>
				<p>Todos los derechos reservados a @WORKINGHOUSE &nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp; Dise&ntilde;o y programaci&oacute;n @Chicotea @EcstaticCoders</p>
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

</body>
</html>

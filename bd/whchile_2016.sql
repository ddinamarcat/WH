-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2017 a las 17:59:48
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `whchile_2016`
--
CREATE DATABASE IF NOT EXISTS `whchile_2016` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `whchile_2016`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `idevento` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) NOT NULL DEFAULT '0',
  `inicio` datetime NOT NULL DEFAULT '2015-01-01 00:00:00',
  `fin` datetime DEFAULT '2015-01-01 00:00:00',
  `urlimagenhome` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/aficheHomePredeterminado.png',
  `urlthumbnail` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/aficheThumbnailPredeterminado.png',
  `urlafiche` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/afichePredeterminado.png',
  `titulo` char(255) COLLATE utf8_unicode_ci DEFAULT 'T&iacute;tulo',
  `descripcion` text COLLATE utf8_unicode_ci,
  `participantes` varchar(512) COLLATE utf8_unicode_ci DEFAULT 'No especificado',
  `urlinscripcion` varchar(512) COLLATE utf8_unicode_ci DEFAULT '#eventos',
  `idioma` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Espa&ntilde;ol',
  `precio` int(11) NOT NULL DEFAULT '0',
  `cupos` int(11) NOT NULL DEFAULT '0',
  `organizado` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Working House',
  `lugar` varchar(512) COLLATE utf8_unicode_ci DEFAULT 'Orompello #178',
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idevento`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idevento`, `estado`, `inicio`, `fin`, `urlimagenhome`, `urlthumbnail`, `urlafiche`, `titulo`, `descripcion`, `participantes`, `urlinscripcion`, `idioma`, `precio`, `cupos`, `organizado`, `lugar`, `destacado`) VALUES
(1, 1, '2016-04-02 10:00:00', '2016-04-02 18:00:00', 'img/eventos/arduinohome.jpg', 'img/eventos/arduinothumb.jpg', 'img/eventos/arduino.png', 'Día del Arduino (11° Aniversario)', 'Queremos invitarte a participar del 11° aniversario de la creación del Arduino; uno de los microcontroladores más famosos del mundo. Habrá diferentes actividades desde concursos, clínicas y talleres, stands y exposiciones de proyectos, charlas y más. La entrada es gratuita.', 'Arduconce - Comunidad Arduino Concepción - Fab Lab', 'http://welcu.cl/fiuiuAHSIHASDIF?=0', 'Español', 0, 60, 'Working House', 'Orompello 178, Concepción (Working House)', 0),
(2, 1, '2016-02-11 16:00:00', '2016-02-11 18:00:00', 'img/eventos/coworksurhome.jpg', 'img/eventos/coworksurthumb.jpg', 'img/eventos/coworksur.png', 'Encuentro de Espacios de Cowork al Sur de Chile', 'Encuentro de Espacios de Cowork al Sur de Chile.', 'Working House(Concepción) - Urban Station(Concepción) - Coworking Maule(Talca) - Kowork(Temuco) - Nube(Valdivia y Osorno) - Cowo(Puerto Montt) - Espacio Haruwen(Chiloé) - Sinergia Coworking(Coyhaique)', 'http://welcu.cl/fiuiuAHSIHASDIF?=2', 'Español', 0, 0, 'Working House / Urban Station', 'Orompello 178, Concepción (WH)', 0),
(3, 1, '2016-03-07 18:00:00', '2016-03-07 21:00:00', 'img/eventos/dmhshome.jpg', 'img/eventos/dmhsthumb.jpg', 'img/eventos/dmhs.png', 'Digital Marketing for Startups', 'Learn how to use powerful, data-driven tactics to generate more leads and grow your use base. This workshop explores the art and science of growth hacking, from social to search, paid ads to public relations, A/B testing to automation. You\'ll cover a variety of scalable and repeatable techniques to gain customers. Plus you ll discover the skills needed in each stage or user acquisition and the tools to help you attract users, measure your success and keep up with the fast moving digital marketing landscape.', 'Trevor Stafford', 'http://welcu.cl/fiuiuAHSIHASDIF?=3', 'English', 0, 60, 'Working House', 'Orompello 178, Concepción (WH)', 0),
(4, 1, '2016-04-27 18:00:00', '2016-04-27 22:00:00', 'img/eventos/115754stwhome.jpg', 'img/eventos/115754stwthumb.jpg', 'img/eventos/115754stw.png', 'Startup Women', 'Radiografía del emprendimiento femenino en Chile.', 'Patricia Hansen - Isidora Contesse - Beatriz Millán - Andrea Catalán', 'https://welcu.com/working-house/startup-women-ccp', 'Español', 3670, 100, 'Working House', 'Orompello 178, Concepción (WH)', 1),
(5, 1, '2016-04-16 18:00:00', '2016-04-16 20:00:00', 'img/eventos/202880atozhome.jpg', 'img/eventos/202880atozthumb.jpg', 'img/eventos/202880atoz.png', 'Startups From a to z', 'Always wanted to start your own business? Have an idea but you are not sure how to follow through? Listen to the stories of global entrepreneurs who have launched their own business!', 'Fabrizzio Andrioli - Manuel Saintotte - Branislav Nikolic - Shaun Roncken - Maxim Osipov - Diego Bolettieri', 'https://welcu.cl/fiuiuAHSwrthDIF?=2', 'English', 0, 60, 'Start-Up Chile', 'Orompello 178, Concepción (WH)', 1),
(8, 1, '2016-05-18 19:00:00', '2016-05-18 19:50:00', 'img/eventos/metodologiasagileshome.jpg', 'img/eventos/metodologiasagilesthumb.jpg', 'img/eventos/metodologiasagiles.png', 'Intro a las Metodologías Ágiles', '¿Quieres saber qué son las metodologías ágiles?&#10;Ven a saber por qué ocuparlas sus principios, beneficios y a ponerlas en práctica con ejemplos prácticos.', 'Mauricio Herrera González', 'http://welcu.cl/fiuiuRgDkargfDIF?=4', 'Español', 0, 25, 'Working House', 'Orompello 178, Concepción (WH)', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `idnoticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` char(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'T&iacute;tulo',
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fechapublicacion` datetime NOT NULL DEFAULT '2015-01-01 00:00:00',
  `urlimagenhome` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/noticiaHomePredeterminado.png',
  `urlthumbnail` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/noticiaThumbnailPredeterminado.png',
  `urlafiche` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/noticiaPredeterminado.png',
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idnoticia`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idnoticia`, `titulo`, `descripcion`, `idusuario`, `fechapublicacion`, `urlimagenhome`, `urlthumbnail`, `urlafiche`, `destacado`, `estado`) VALUES
(4, 'Nueva Página Web', 'Pronto...hf bdjdsfvjbvjhbvjh bjdfjhbsjvhj&#10;fsdkufhsdifhsdi &#10;df isdjfosdjfosdjfo', 1, '2016-09-16 03:00:00', 'img/noticias/413182IMG_2956home.jpg', 'img/noticias/413182IMG_2956thumb.jpg', 'img/noticias/413182IMG_2956.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

DROP TABLE IF EXISTS `suscriptores`;
CREATE TABLE IF NOT EXISTS `suscriptores` (
  `idsuscriptor` int(11) NOT NULL AUTO_INCREMENT,
  `email` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT '2015-01-01 00:00:00',
  PRIMARY KEY (`idsuscriptor`),
  UNIQUE KEY `email` (`email`),
  KEY `fecha` (`fecha`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`idsuscriptor`, `email`, `fecha`) VALUES
(1, 'jaimefortega@gmail.com', '2015-01-01 00:00:00'),
(7, 'jaimefortega@linux.com', '2015-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `user` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` char(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '12345',
  `nombre` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` tinyint(4) NOT NULL DEFAULT '0',
  `url_imagen` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/equipo/incognito.png',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Usuarios';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `user`, `email`, `pass`, `nombre`, `apellido`, `tipo`, `url_imagen`) VALUES
(1, 'ddinamarcat', 'ddinamarcat@gmail.com', 'RatonpereZ3', 'Daniel', 'Dinamarca', 1, 'img/equipo/incognito.png'),
(2, 'jaimefortega', 'jaimefortega@gmail.com', 'RatonpereZ2', 'Jaime', 'Ortega', 1, 'img/equipo/incognito.png'),
(3, 'braulio', 'braulio@gmail.com', 'braulio', 'braulio', 'Polymeris', 1, 'img/equipo/incognito.png'),
(4, 'pericles', 'periclesadams@gmail.com', 'pericles', 'Pericles', 'Adams', 1, 'img/equipo/incognito.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

DROP TABLE IF EXISTS `visitas`;
CREATE TABLE IF NOT EXISTS `visitas` (
  `idvisita` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asunto` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idvisita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_eventos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_eventos`;
CREATE TABLE IF NOT EXISTS `vista_eventos` (
`idevento` int(11)
,`estado` int(11)
,`inicio` datetime
,`fin` datetime
,`urlimagenhome` varchar(512)
,`urlthumbnail` varchar(512)
,`urlafiche` varchar(512)
,`titulo` char(255)
,`descripcion` text
,`participantes` varchar(512)
,`urlinscripcion` varchar(512)
,`idioma` varchar(512)
,`precio` int(11)
,`cupos` int(11)
,`organizado` varchar(512)
,`lugar` varchar(512)
,`destacado` tinyint(4)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_noticias`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_noticias`;
CREATE TABLE IF NOT EXISTS `vista_noticias` (
`idnoticia` int(11)
,`titulo` char(255)
,`estado` tinyint(4)
,`descripcion` text
,`idusuario` varchar(65)
,`fechapublicacion` datetime
,`urlimagenhome` varchar(512)
,`urlthumbnail` varchar(512)
,`urlafiche` varchar(512)
,`destacado` tinyint(4)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_eventos`
--
DROP TABLE IF EXISTS `vista_eventos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`whchile_2016`@`localhost` SQL SECURITY DEFINER VIEW `vista_eventos`  AS  select `eventos`.`idevento` AS `idevento`,`eventos`.`estado` AS `estado`,`eventos`.`inicio` AS `inicio`,`eventos`.`fin` AS `fin`,`eventos`.`urlimagenhome` AS `urlimagenhome`,`eventos`.`urlthumbnail` AS `urlthumbnail`,`eventos`.`urlafiche` AS `urlafiche`,`eventos`.`titulo` AS `titulo`,`eventos`.`descripcion` AS `descripcion`,`eventos`.`participantes` AS `participantes`,`eventos`.`urlinscripcion` AS `urlinscripcion`,`eventos`.`idioma` AS `idioma`,`eventos`.`precio` AS `precio`,`eventos`.`cupos` AS `cupos`,`eventos`.`organizado` AS `organizado`,`eventos`.`lugar` AS `lugar`,`eventos`.`destacado` AS `destacado` from `eventos` order by `eventos`.`inicio` desc ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_noticias`
--
DROP TABLE IF EXISTS `vista_noticias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`whchile_2016`@`localhost` SQL SECURITY DEFINER VIEW `vista_noticias`  AS  select `noticias`.`idnoticia` AS `idnoticia`,`noticias`.`titulo` AS `titulo`,`noticias`.`estado` AS `estado`,`noticias`.`descripcion` AS `descripcion`,concat(`usuarios`.`nombre`,' ',`usuarios`.`apellido`) AS `idusuario`,`noticias`.`fechapublicacion` AS `fechapublicacion`,`noticias`.`urlimagenhome` AS `urlimagenhome`,`noticias`.`urlthumbnail` AS `urlthumbnail`,`noticias`.`urlafiche` AS `urlafiche`,`noticias`.`destacado` AS `destacado` from (`noticias` join `usuarios`) where (`noticias`.`idusuario` = `usuarios`.`idusuario`) order by `noticias`.`fechapublicacion` desc ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

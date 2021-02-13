-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2017 a las 15:08:12
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `reproductormusica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_Album` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_Album` varchar(45) DEFAULT NULL,
  `id_Artista` int(10) NOT NULL,
  PRIMARY KEY (`id_Album`),
  KEY `id_Artista` (`id_Artista`),
  KEY `id_Artista_2` (`id_Artista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id_Album`, `nombre_Album`, `id_Artista`) VALUES
(7, 'Thriller y Motown', 1),
(8, 'Waka waka', 4),
(9, 'I Love Acoustic', 5),
(10, 'One ok rock', 6),
(11, 'Betraying the Martyrs', 7),
(12, 'blue train', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE IF NOT EXISTS `artista` (
  `id_Artista` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_Artista` varchar(45) DEFAULT NULL,
  `edad_Artista` date DEFAULT NULL,
  `nacionalidad_Artista` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id_Artista`),
  KEY `id_Artista` (`id_Artista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id_Artista`, `nombre_Artista`, `edad_Artista`, `nacionalidad_Artista`) VALUES
(1, 'Michael Jackson', NULL, 'Estadounidense'),
(3, 'Katy Perry', NULL, 'Estadounidense'),
(4, 'Shakira', NULL, 'Colombiana'),
(5, 'Vanessa Carlton', NULL, 'Estadounidense'),
(6, 'Toru Yamashita', NULL, 'Japones'),
(7, 'Aaron Matts', NULL, 'Frances'),
(8, 'AKFG', NULL, 'Japones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE IF NOT EXISTS `cancion` (
  `id_Cancion` int(10) NOT NULL AUTO_INCREMENT,
  `titulo_Cancion` varchar(30) DEFAULT NULL,
  `genero_Cancion` int(10) NOT NULL,
  `version_Cancion` varchar(20) DEFAULT NULL,
  `album_Cancion` int(10) DEFAULT NULL,
  `duracion_Cancion` time DEFAULT NULL,
  `sello_Cancion` int(10) DEFAULT NULL,
  `count_Cancion` int(11) DEFAULT NULL,
  `ruta_Cancion` varchar(1000) DEFAULT NULL,
  `imagen_Cancion` varchar(100) DEFAULT NULL,
  `id_reproduccion` int(11) NOT NULL,
  PRIMARY KEY (`id_Cancion`),
  KEY `sello_Cancion` (`sello_Cancion`),
  KEY `album_Cancion` (`album_Cancion`),
  KEY `genero_Cancion` (`genero_Cancion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id_Cancion`, `titulo_Cancion`, `genero_Cancion`, `version_Cancion`, `album_Cancion`, `duracion_Cancion`, `sello_Cancion`, `count_Cancion`, `ruta_Cancion`, `imagen_Cancion`, `id_reproduccion`) VALUES
(4, 'working for the weekend', 2, 'original', 8, '00:03:43', 12, 2, '../recursos/song/4', '../recursos/images/img_album/Working_for_the_Weekend.png', 0),
(10, 'A thousand Miles', 1, 'Original', 9, '00:04:01', 13, 0, '../recursos/song/10', '../recursos/images/img_album/10_A_Thousand_Miles.jpg', 0),
(59, 'Take me to the top', 1, 'Origrinal', 10, '00:03:18', 14, 0, '../recursos/song/59.mp3', '../recursos/images/img_album/59', 0),
(60, 'Beat it', 1, 'Original', 7, '00:04:18', 11, 0, '../recursos/song/60.mp3', '../recursos/images/img_album/60', 0),
(61, 'Let it go', 6, 'Cover', 11, '00:04:24', 10, 0, '../recursos/song/61.mp3', '../recursos/images/img_album/61', 0),
(63, 'Part of me', 1, 'Original', 11, '00:04:24', 14, 0, '../recursos/song/63.mp3', '../recursos/images/img_album/63', 0),
(64, 'cancion china', 1, 'Original', 10, '00:04:13', 12, 0, '../recursos/song/64.mp3', '../recursos/images/img_album/64', 0),
(65, 'blue train', 2, 'Original', 12, '00:03:40', 13, 0, '../recursos/song/65.mp3', '../recursos/images/img_album/65', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion_usuario`
--

CREATE TABLE IF NOT EXISTS `cancion_usuario` (
  `id_CancionUsuario` int(10) NOT NULL AUTO_INCREMENT,
  `id_Usuario` int(10) DEFAULT NULL,
  `id_Cancion` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_CancionUsuario`),
  KEY `id_Usuario` (`id_Usuario`),
  KEY `id_Cancion` (`id_Cancion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `cancion_usuario`
--

INSERT INTO `cancion_usuario` (`id_CancionUsuario`, `id_Usuario`, `id_Cancion`) VALUES
(9, 5, 10),
(11, 5, 61),
(12, 5, 60),
(13, 5, 59),
(15, 5, 4),
(17, 11, 4),
(18, 11, 10),
(20, 11, 60),
(21, 5, 63),
(22, 5, 64),
(23, 12, 61),
(24, 12, 63),
(25, 12, 4),
(26, 12, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cancionartista`
--

CREATE TABLE IF NOT EXISTS `detalle_cancionartista` (
  `id_Cancion` int(10) NOT NULL,
  `id_Artista` int(10) NOT NULL,
  KEY `id_Cancion` (`id_Cancion`),
  KEY `id_Artista` (`id_Artista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_lista`
--

CREATE TABLE IF NOT EXISTS `detalle_lista` (
  `id_DetalleLista` int(100) NOT NULL AUTO_INCREMENT,
  `id_Cancion` int(10) NOT NULL,
  `id_Lista` int(10) NOT NULL,
  PRIMARY KEY (`id_DetalleLista`),
  KEY `id_Cancion` (`id_Cancion`),
  KEY `id_Lista` (`id_Lista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `detalle_lista`
--

INSERT INTO `detalle_lista` (`id_DetalleLista`, `id_Cancion`, `id_Lista`) VALUES
(1, 10, 1),
(2, 60, 1),
(5, 61, 14),
(6, 60, 15),
(7, 4, 15),
(8, 4, 16),
(9, 60, 16),
(10, 10, 16),
(12, 61, 18),
(13, 63, 18),
(14, 4, 18),
(15, 64, 18),
(16, 63, 19),
(17, 4, 19),
(18, 61, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id_Genero` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_Genero` varchar(20) DEFAULT NULL,
  `descripcion_Genero` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_Genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_Genero`, `nombre_Genero`, `descripcion_Genero`) VALUES
(1, 'pop', 'es un gÃ©nero de mÃºsica popular que tuvo su origen a finales de los aÃ±os 1950 como una derivaciÃ³n del tradicional pop, en combinaciÃ³n con otros gÃ©neros musicales que estaban de moda en aquel momento.  '),
(2, 'Rock', 'La mÃºsica rock tambiÃ©n se nutriÃ³ fuertemente del blues y el folk, e incorporÃ¡ influencias del jazz, la mÃºsica clÃ¡sica y otras fuentes. El rock se ha centrado en la guitarra elÃ©ctrica, normalmente como parte de un grupo de rock con cantante, bajo, baterÃ­a y, algunas veces, instrumentos de teclado como el Ã³rgano y el piano.  '),
(3, 'Jazz', 'es un gÃ©nero musical nacido a finales del siglo XIX en Estados Unidos, que se expandiÃ³ de forma global a lo largo de todo el siglo XX. algo mas paso'),
(5, 'JPop', 'El J-Pop moderno tiene sus raÃ­ces en la mÃºsica tradicional japonesa, pero significativamente en la mÃºsica popular de los sesenta y la mÃºsica rock, como The Beatles y The Beach Boys, los cuales llevaron a bandas de rock japonÃ©s como Happy End fusionando el rock con la mÃºsica de JapÃ³n a inicios de los setentas.'),
(6, 'Metal', 'Es un gÃ©nero musical que naciÃ³ a mediados de los aÃ±os sesenta y principios de los setenta en el Reino Unido y en los Estados Unidos, cuyos orÃ­genes provienen del blues rock, hard rock y del rock psicodÃ©lico. Se caracteriza principalmente por sus guitarras fuertes y distorsionadas, ritmos enfÃ¡ticos, los sonidos del bajo y la baterÃ­a son mÃ¡s densos de lo habitual y por voces generalmente agudas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
  `id_Lista` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_Lista` varchar(50) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Privacidad` int(10) NOT NULL,
  PRIMARY KEY (`id_Lista`),
  KEY `id_Privacidad` (`id_Privacidad`),
  KEY `id_Usuario` (`id_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`id_Lista`, `nombre_Lista`, `id_Usuario`, `id_Privacidad`) VALUES
(1, 'Rock 80', 5, 2),
(13, 'Canciones bonitas', 10, 1),
(14, 'Otras canciones', 5, 1),
(15, 'musiquitachina', 11, 2),
(16, 'musica normal dice', 11, 2),
(18, 'Cancion pop', 5, 1),
(19, 'cancion ni se', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privacidad`
--

CREATE TABLE IF NOT EXISTS `privacidad` (
  `id_Privacidad` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_Privacidad` varchar(30) NOT NULL,
  PRIMARY KEY (`id_Privacidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `privacidad`
--

INSERT INTO `privacidad` (`id_Privacidad`, `nombre_Privacidad`) VALUES
(1, 'Publica'),
(2, 'Privada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sello`
--

CREATE TABLE IF NOT EXISTS `sello` (
  `id_Sello` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_Sello` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_Sello`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `sello`
--

INSERT INTO `sello` (`id_Sello`, `nombre_Sello`) VALUES
(1, 'Mushroom Studios'),
(10, 'Warner Music Group'),
(11, 'Sony Music Entertainment'),
(12, 'Universal Music Group'),
(13, 'EMI'),
(14, 'Warner Bros. Records');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `id_TipoUsuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_TipoUsuario` varchar(30) NOT NULL,
  PRIMARY KEY (`id_TipoUsuario`),
  KEY `id_TipoUsuario` (`id_TipoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id_TipoUsuario`, `nombre_TipoUsuario`) VALUES
(1, 'usuario'),
(2, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Usuario` varchar(30) NOT NULL,
  `apellido_Usuario` varchar(30) NOT NULL,
  `correo_Usuario` varchar(45) NOT NULL,
  `edad_Usuario` int(3) NOT NULL,
  `fechaNac_Usuario` date NOT NULL,
  `password_Usuario` varchar(120) NOT NULL,
  `imagen_Usuario` varchar(100) NOT NULL,
  `id_TipoUsuario` int(10) NOT NULL,
  PRIMARY KEY (`id_Usuario`),
  KEY `id_TipoUsuario` (`id_TipoUsuario`),
  KEY `id_Usuario` (`id_Usuario`),
  KEY `id_Usuario_2` (`id_Usuario`),
  KEY `id_TipoUsuario_2` (`id_TipoUsuario`),
  KEY `correo_Usuario` (`correo_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `nombre_Usuario`, `apellido_Usuario`, `correo_Usuario`, `edad_Usuario`, `fechaNac_Usuario`, `password_Usuario`, `imagen_Usuario`, `id_TipoUsuario`) VALUES
(5, 'Usuario', 'Php', 'usuario@gmail.com', 21, '1995-09-02', 'c4ca4238a0b923820dcc509a6f75849b', '../recursos/images/img_usuario/5_a.jpg', 1),
(6, 'admin', 'proyecto', 'admin@gmail.com', 23, '0000-00-00', 'c4ca4238a0b923820dcc509a6f75849b', '', 2),
(10, 'Personita', 'sdf', 'alejandrobrr_94@hotmail.com', 52, '1990-06-28', 'c4ca4238a0b923820dcc509a6f75849b', 'recursos/images/img_usuario/usuario.png', 1),
(11, 'Dodanim', 'Gonz', 'kttim@hotmail.com', 24, '1993-04-08', '84cfffb5459f3daa4e9fa2f798a1edf4', '../recursos/images/img_usuario/11_Katy_Perry-Part_Of_Me_(Cd_Single)-Frontal.jpg', 1),
(12, 'Paty', 'Cantu', 'paty@hotmail.com', 37, '1980-02-05', '84cfffb5459f3daa4e9fa2f798a1edf4', '../recursos/images/img_usuario/12_Katy_Perry-Part_Of_Me_(Cd_Single)-Frontal.jpg', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_Artista`) REFERENCES `artista` (`id_Artista`);

--
-- Filtros para la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_ibfk_2` FOREIGN KEY (`sello_Cancion`) REFERENCES `sello` (`id_Sello`),
  ADD CONSTRAINT `cancion_ibfk_3` FOREIGN KEY (`album_Cancion`) REFERENCES `album` (`id_Album`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cancion_ibfk_4` FOREIGN KEY (`genero_Cancion`) REFERENCES `genero` (`id_Genero`);

--
-- Filtros para la tabla `cancion_usuario`
--
ALTER TABLE `cancion_usuario`
  ADD CONSTRAINT `cancion_usuario_ibfk_3` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cancion_usuario_ibfk_4` FOREIGN KEY (`id_Cancion`) REFERENCES `cancion` (`id_Cancion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_cancionartista`
--
ALTER TABLE `detalle_cancionartista`
  ADD CONSTRAINT `detalle_cancionartista_ibfk_2` FOREIGN KEY (`id_Artista`) REFERENCES `artista` (`id_Artista`),
  ADD CONSTRAINT `detalle_cancionartista_ibfk_3` FOREIGN KEY (`id_Cancion`) REFERENCES `cancion` (`id_Cancion`);

--
-- Filtros para la tabla `detalle_lista`
--
ALTER TABLE `detalle_lista`
  ADD CONSTRAINT `detalle_lista_ibfk_2` FOREIGN KEY (`id_Lista`) REFERENCES `lista` (`id_Lista`),
  ADD CONSTRAINT `detalle_lista_ibfk_3` FOREIGN KEY (`id_Cancion`) REFERENCES `cancion_usuario` (`id_Cancion`);

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_2` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`),
  ADD CONSTRAINT `lista_ibfk_3` FOREIGN KEY (`id_Privacidad`) REFERENCES `privacidad` (`id_Privacidad`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_TipoUsuario`) REFERENCES `tipousuario` (`id_TipoUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

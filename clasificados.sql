-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-04-2015 a las 21:59:37
-- Versión del servidor: 5.6.14-log
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clasificados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificados_avisos`
--

CREATE TABLE IF NOT EXISTS `clasificados_avisos` (
  `idaviso` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(64) NOT NULL,
  `fecha_publicacion` varchar(250) NOT NULL,
  `fecha_despublicacion` varchar(250) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `texto_aviso` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fotos` varchar(200) NOT NULL,
  `foto2` varchar(200) NOT NULL,
  `foto3` varchar(200) NOT NULL,
  `precio` double(11,2) NOT NULL,
  `categoria` int(11) NOT NULL,
  `autorizacion` int(11) NOT NULL,
  PRIMARY KEY (`idaviso`),
  KEY `categoria` (`categoria`),
  KEY `categoria_2` (`categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=207 ;

--
-- Volcado de datos para la tabla `clasificados_avisos`
--

INSERT INTO `clasificados_avisos` (`idaviso`, `usuario`, `fecha_publicacion`, `fecha_despublicacion`, `titulo`, `producto`, `texto_aviso`, `cantidad`, `fotos`, `foto2`, `foto3`, `precio`, `categoria`, `autorizacion`) VALUES
(198, 'daniel.maldonado', '23-04-2015', '8-05-2015', 'SE VENDE MARTILLOS', 'Martillo', '<p>Hola vendo martillo totalmente nuevo con 2 meses de garantias</p>', 1, 'martillo3.png', 'martillo2.jpg', 'martillo.jpg', 800.00, 7, 1),
(199, 'daniel.maldonado', '24-04-2015', '9-05-2015', 'VENDO GOMAS AMARILLAS ADIDAS', 'Gomas amarilla', '<p>vendo gomas amarrilla originales. talla 42 modelo tipo para trotar</p>', 1, 'dd.jpg', 'd.jpg', 'adidas.jpg', 2500.00, 3, 1),
(200, 'daniel.maldonado', '24-04-2015', '9-05-2015', 'VENDO FRANELAS ADIDAS', 'Franelas Adidas', '<p>vendo franela adidas tallas unicas colores los que muentra la imagen</p>', 3, 'adidass.jpg', 'adidasss.jpg', 'adi.jpg', 1200.00, 3, 1),
(201, 'daniel.maldonado', '24-04-2015', '9-05-2015', 'VENDO GORRAS ', 'gorras', '<p>estoy vendiendo gorras talla 8 originales</p>', 1, '641-MEC4636115104_072013-O.jpg', 'dolfin.jpg', 'dolfin2.jpg', 1500.00, 3, 1),
(202, 'daniel.maldonado', '24-04-2015', '9-05-2015', 'VENDO TELEFONO SAMSUNG', 'Telefono Samsung', '<p>vendo telefono samsung el precio es negociable. contacteme para el ws: 0414 6221034</p>', 1, '7.jpg', '6.jpg', '5.jpg', 15000.00, 2, 1),
(203, 'daniel.maldonado', '24-04-2015', '9-05-2015', 'VENDO JUGUES PARA NIÑOS', 'Juguetes', '<p>vendo juguetes para ni&ntilde;os fisher price originales</p>', 3, 'jug2.jpg', 'jug.jpg', 'jug3.jpg', 2000.00, 13, 1),
(204, 'daniel.maldonado', '24-04-2015', '', 'SE VENDE RELOJ ORIGINAL', 'Reloj Armany X', '<p>vendo reloj armani para caballeros.originales</p>', 1, 'armanyy.jpg', 'armany.jpg', 'ar.jpg', 70000.00, 4, 0),
(205, 'daniel.maldonado', '24-04-2015', '', 'VENDO LECHA CONDENSADA', 'Leche Condensada', '<p>vendo leche condensada.</p>', 1, 'lacam.jpg', 'bloques.jpg', 'cam.jpg', 2000.00, 8, 0),
(206, 'paul.galban', '24-04-2015', '9-05-2015', 'GYFF', '', '', 56, '20140905_113557.jpg', '20140905_113521.jpg', '20140905_113505.jpg', 8976789.00, 27, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificados_categorias`
--

CREATE TABLE IF NOT EXISTS `clasificados_categorias` (
  `idcategorias` int(11) NOT NULL AUTO_INCREMENT,
  `categorias` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`idcategorias`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `clasificados_categorias`
--

INSERT INTO `clasificados_categorias` (`idcategorias`, `categorias`, `descripcion`, `estatus`) VALUES
(1, 'Inmuebles', 'Compra y Venta de Locales comerciales, Terrenos, Apartamentos, Casas, y todo lo referente a activos inmuebles.', 1),
(2, 'Electronicos', 'Compra y Venta de artículos o artefactos electrónicos o eléctricos, como los son: Teléfonos Móviles, Laptops, Computadoras, Televisores, Consolas de Vídeo Juegos, Herramientas eléctricas, Equipos de Sonido, Entre otros.', 1),
(3, 'Ropa, Calzado y Accesorios', 'Compra y Venta de Ropa ,Calzado, Accesorios, como los son: Blusas, Pantalones, Franelas, Jeans, Carteras, Zapatos de vestir, Gomas deportivas, Gorras, Entre otros', 1),
(4, 'Joyas ', 'Compra y Venta de Oro,Plata, Acero, Bisuteria, como lo son: Cadenas, Anillos, Pulseras, Zarcillos, Gargantillas, Entre Otros.\n', 1),
(5, 'Gastronomía', 'Compra y Venta de  Comidas por encargo, Dulces, Pastelería, como lo son: Hallacas, Pan de jamón, Tortas, Mermeladas, Quesillos, Ponquesitos, Empanadas, Pastelitos, Entre otras.', 1),
(6, 'Reparación e Instalaciones', 'Ofertas de Servicio de Reparaciones e Instalaciones de:Antenas Satelitales, Audio y Video, Computadoras, Celulares, Sistemas de Seguridad, Equipos industriales, Automóviles, Entre Otros.\n', 1),
(7, 'Herramientas', 'Compra y Venta de Herramientas Manuales, eléctricas, como lo son: Destornilladores, Martillos, Máquinas de Soldar,Taladros,Entre Otros', 1),
(8, 'Fiestas y Eventos', 'Ofertas de Servicios de Fiestas y Eventos, como lo son:Alquiler de Equipamiento, Decoración y Ambientación, Entretenimiento, Salones, Catering y Bebidas, Entre Otras.', 1),
(9, 'Belleza e Higiene Personal', 'Ofertas de Servicios,Compra y Venta de Productos de Belleza e Higiene Personal, como lo son: Peluquería, Cosmetología, Maquillaje, Manicure y Pedicure, Tratamientos Corporales, Tatuajes y Piercing, Entre Otras.', 1),
(10, 'Traslados y Envíos', 'Oferta de Servicios de Traslados y Envíos, como lo son: Gruas, Mudanzas y Fletes, Taxis y Traslado Ejecutivo, Transporte Escolar o Universitario, Entre Otros.', 1),
(11, 'Vehículos', 'Compra y Venta de Vehículos, Accesorios, como lo son:\nCarros, Motos, Camionetas, lanchas, Motores, Cajas Automaticas y Sincronicas, Limpia para brisas, Reproductores, Entre Otros.', 1),
(12, 'Construcción', 'Ofertas de Servicios de Albañileria, Plomería, Electricidad, como lo son: Enmacillaje, Destapar Cañerías, Bloquería, Instalación de 110v y 220v, Pisos y Cerámicas, Entre Otros', 1),
(14, 'Deportes y Fitness', 'Compra y Venta de árticulos deportivos y fitness como lo son: Balones, Pelotas, Bates, Guantes, Pesas, Multifuerzas, Tacos, Arquerías, Tableros, Entre Otros.', 1),
(13, 'Juegos y Juguetes', 'Compra y Venta de Juegos, Juguetes, Accesorios como lo son: Juegos de mesa, Rompecabezas, Bicicletas, Carritos a Control Remoto y de Bateria, Muñecas, Legos, Pelotas, Balones, Entre Otras. ', 1),
(27, 'Otro', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

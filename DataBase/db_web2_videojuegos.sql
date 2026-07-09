-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2026 a las 02:47:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_web2_videojuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nombre_apellido` varchar(50) NOT NULL,
  `e_mail` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `nombre_apellido`, `e_mail`, `password`) VALUES
(1, 'Mauro Ordoñez', 'mauro@mail.com', '$2y$10$bEGP/svXdlPzWRg2ixob6uWU0PFg.aBIrpfCvqJEP9q18Y1qibl4C'),
(2, 'Profes Web 2 - TUDAI LF', 'webadmin@mail.com', '$2y$10$9OKowsVmpKakOBEIZt9Aaeyli7X2Ahc1Dsl9694L3aNTB605IjB0m');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editor`
--

CREATE TABLE `editor` (
  `id_editor` int(11) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `pais` varchar(20) NOT NULL,
  `sitio_web` varchar(100) NOT NULL,
  `valoracion` int(11) DEFAULT NULL,
  `imagen` varchar(400) DEFAULT NULL
) ;

--
-- Volcado de datos para la tabla `editor`
--

INSERT INTO `editor` (`id_editor`, `nombre_empresa`, `descripcion`, `pais`, `sitio_web`, `valoracion`, `imagen`) VALUES
(1, 'SCS SOFTWARE', 'SCS Software es una empresa checa de desarrollo de software. Creada en 1997 tiene la sede en Praga, República Checa. La empresa ha producido varios videojuegos para PC y Mac incluyendo la serie 18 Wheels of Steel, la serie Hunting Unlimited, OceanDive, Deer Drive, Bus Driver o Euro Truck Simulator y el último producido, American Truck Simulator. También ha desarrollado varios motores gráficos como Prism3D o Terreng.', 'Republica Checa', 'http://www.scssoft.com', 5, '1779674978_HDshueDbgAACA1U.jpg'),
(2, 'ELECTRONIC ARTS', 'Electronic Arts Inc. (EA) es una empresa estadounidense desarrolladora y distribuidora de videojuegos, fundada por Trip Hawkins el 27 de mayo de 1982 en San Mateo, California. Sus oficinas centrales están en Redwood City, California. Tiene estudios en varias ciudades de Estados Unidos, en Canadá, Suecia, Corea del Sur, China, Inglaterra y España y otros países. Posee diversas subsidiarias, como EA Sports, encargada de los simuladores deportivos, EA Worldwide para los demás juegos, y subsidiarias adquiridas durante el tiempo como Firemonkeys Studios, BioWare, entre otras. Actualmente, desarrolla y publica juegos que incluyen los títulos de EA Sports FIFA, Madden NFL, NHL, NBA Live y UFC. Otras franquicias incluyen Battlefield, Need for Speed, Real Racing, Los Sims, Medal of Honor, Command & Conquer, Dead Space, Mass Effect, Dragon Age, Army of Two, Titanfall y Star Wars: The Old Republic, entre otros. Es el creador de EA App, plataformas de distribución digital de juegos en línea para ordenadores en donde se encuentran todos sus juegos.', 'Estados Unidos', 'http://www.ea.com', 5, '1779674995_ea-featured-image-generic-brand-logo.png.adapt.crop16x9.1023w.png'),
(3, 'ACTIVISION', 'Activision Publishing, Inc. es una empresa de videojuegos estadounidense propiedad de Activision Blizzard. Fue el primer desarrollador y distribuidor independiente de este tipo de juegos, fundado el 1 de octubre de 1979 y con sede en Santa Mónica, California. Sus primeros productos fueron cartuchos para la videoconsola Atari 2600; en la actualidad, es la tercera mayor distribuidora de videojuegos, y ha creado diversos títulos, entre ellos Call of Duty. En enero de 2022, Microsoft anunció la compra del propietario de Activision, Activision Blizzard, por 68 700 millones de dólares y finalizó el 13 de octubre de 2023 aunque, la adquisición tuvo sus demoras en el proceso de la compra.', 'Inglaterra', 'http://www.activision.com', 3, '1779675015_1711564928125.jpg'),
(4, 'AMANITA DESING', 'Amanita Design es una compañía checa desarrolladora de videojuegos independientes, que fue fundada en 2003 por Jakub Dvorský. La compañía ha desarrollado varios videojuegos que han ganado los Premios Webby, como juegos educativos, minijuegos y publicidad, todos creados usando Adobe Flash. Su primer juego, Samorost, fue publicado en su página web en el 2003 y su último juego, Happy Game, fue lanzado al mercado en el 2021. Actualmente, su obra más popular es Machinarium, que salió a la venta en el 2009, y fue ganador del premio Excellence in Visual Art, del 12º Independent Festival Games.', 'Estados Unidos', 'http://www.amanita-design.net', 5, '1779675028_amanita-design-og-image.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video_juego`
--

CREATE TABLE `video_juego` (
  `id_juego` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(6,2) NOT NULL,
  `resenia` text DEFAULT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `valoracion` int(11) DEFAULT NULL,
  `imagen` varchar(400) DEFAULT NULL,
  `id_editor` int(11) NOT NULL
) ;

--
-- Volcado de datos para la tabla `video_juego`
--

INSERT INTO `video_juego` (`id_juego`, `titulo`, `descripcion`, `precio`, `resenia`, `fecha_lanzamiento`, `valoracion`, `imagen`, `id_editor`) VALUES
(1, 'EURO TRUCK SIMULATOR 2', 'Simulador de conducción de camiones', 10.23, '¡Recorre Europa como el rey de la carretera, un camionero que entrega carga importante a través de distancias impresionantes! Con docenas de ciudades para explorar en el Reino Unido, Bélgica, Alemania, Italia, Países Bajos, Polonia y muchos más, tu resistencia, habilidad y velocidad se pondrán a prueba al máximo. Si tienes lo que se necesita para formar parte de la élite del transporte por carretera, ¡ponte al volante y demuéstralo!   ', '2012-05-03', 5, '1779679606_Euro-Truck-Simulator-2-cover.jpg', 1),
(2, 'FC 26', 'Deportes, Fútbol', 89.90, 'Juega a tu manera en EA SPORTS FC™ 26 con regates más ágiles, una posición más inteligente de la IA y movimientos más nítidos y explosivos, todo basado en los comentarios de la comunidad. Los guardametas ahora reaccionan de manera más natural con una posición mejorada, las animaciones son más realistas, y los nuevos estilos de juego y roles de jugadores te ofrecen más formas de definir cómo juega tu equipo. ', '2026-02-05', 5, '1779679624_fifa26_acab26b6-032f-420d-8c7e-d81cc495b795.webp', 2),
(3, 'CALL OF DUTY', 'Shooter, mundo abierto', 55.90, 'Call of Duty es un juego de disparos en primera persona, que tiene lugar en la Segunda Guerra Mundial. Fue lanzado a la venta el 29 de Octubre del 2003 para PC, publicado por Activision y desarollado por Infinity Ward. Fue la primera entrega de la saga Call of Duty, pero no fue ampliamente comercializado hasta la salida de Call of Duty Classics. ', '2003-10-29', 5, '1779679639_Store_BO6PDP_Hero.webp', 3),
(4, 'MACHINARIUM', 'Puzzle aventura', 5.60, 'Ayuda a Josef el robot a salvar a su novia Berta, secuestrada por la Hermandad del Sombrero Negro! Machinarium es un galardonado juego de puzle y aventura independiente desarrollado por los creadores de los populares juegos Samorost y Botanicula. Un pequeño robot que ha sido arrojado al desguace detrás de la ciudad debe regresar y enfrentarse a la Hermandad Black Cap y salvar a su amiga robot.      ', '2010-09-24', 4, '1779679652_machi.jpg', 4),
(6, 'F1 25', 'Simulacíon de conducción de carreras', 46.00, 'F1 25 es un videojuego de carreras desarrollado por Codemasters y publicado por EA Sports. Es la decimoctava entrada en la serie F1 y cuenta con la licencia para los campeonatos de Fórmula 1 y Fórmula 2 de la temporada 2025. El juego se lanzó el 30 de mayo de 2025[nota 1] en ediciones físicas y digitales en PlayStation 5, Microsoft Windows y Xbox Series X|S. El juego marca la primera entrada en un juego de Fórmula 1 que no se lanza en consolas de octava generación desde F1 2014, ya que F1 25 se centra en las consolas de la generación actual. ', '2025-03-03', 5, '1779667382_maxresdefault.jpg', 2),
(7, 'AMERICAN TRUCK SIMULATOR ', 'Simulador de conducción de camiones', 9.80, '  ¡Recorre América como el rey de la carretera, un camionero que entrega carga importante a través de distancias impresionantes! Con docenas de ciudades para explorar en California, Texas, Alabama, Nuevo México, Nevada, Arizona y muchos más, tu resistencia, habilidad y velocidad se pondrán a prueba al máximo. Si tienes lo que se necesita para formar parte de la élite del transporte por carretera, ¡ponte al volante y demuéstralo! ', '2013-05-12', 2, '1780182790_images_2016_Informes_Fichines_american-truck-simulator_american-truck-simulator-main.jpg', 1),
(8, 'SIMS', 'Simulador vida real', 5.89, 'Sims es un juego en el que vas a poder sumergirte en el manejo de la vida de una familia tipo. Te animas? ', '2012-09-18', 3, '1780184416_sims.png', 3),
(9, 'CREAKS', 'Puzzle inmersive aventur', 7.90, ' La tierra tiembla, las bombillas se rompen y algo extraño pasa más allá de las paredes de tu cuarto. Con solo tu ingenio y tu valor, adéntrate en un mundo lleno de seres alados y, por lo visto, muebles monstruosos mortíferos. ', '2019-07-27', 4, '1781565884_creaks-2.jpg', 4),
(10, 'NFS MOST WANTED', 'Conduccion mundo abierto, tunnig', 1.00, ' Need for Speed Most Wanted es un videojuego de carreras desarrollado por EA Black Box y lanzado primero por Electronic Arts el 16 de noviembre de 2005 en los Estados Unidos. Es parte de la serie de videojuegos Need for Speed.', '2005-10-16', 5, '1781570353_NFS-most-wanted.webp', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id_editor`),
  ADD UNIQUE KEY `UK_NOMBRE_EMPRESA_EDITOR` (`nombre_empresa`);

--
-- Indices de la tabla `video_juego`
--
ALTER TABLE `video_juego`
  ADD PRIMARY KEY (`id_juego`),
  ADD UNIQUE KEY `UK_TITULO_JUEGO` (`titulo`),
  ADD KEY `VIDEO_JUEGO_EDITOR` (`id_editor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `editor`
--
ALTER TABLE `editor`
  MODIFY `id_editor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `video_juego`
--
ALTER TABLE `video_juego`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `video_juego`
--
ALTER TABLE `video_juego`
  ADD CONSTRAINT `VIDEO_JUEGO_EDITOR` FOREIGN KEY (`id_editor`) REFERENCES `editor` (`id_editor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

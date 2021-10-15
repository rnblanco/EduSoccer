-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-10-2021 a las 23:58:21
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17703196_edu_soccer`
--
CREATE DATABASE IF NOT EXISTS `id17703196_edu_soccer` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id17703196_edu_soccer`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(220) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Fecha_Matricula` date DEFAULT NULL,
  `Imagen` varchar(220) DEFAULT NULL,
  `Nombre_Padre` varchar(220) DEFAULT NULL,
  `Telefono_Padre` varchar(11) DEFAULT NULL,
  `Nombre_Madre` varchar(220) DEFAULT NULL,
  `Telefono_Madre` varchar(11) DEFAULT NULL,
  `Contacto` varchar(220) NOT NULL,
  `Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID`, `Nombre`, `Edad`, `Fecha_Nacimiento`, `Fecha_Ingreso`, `Fecha_Matricula`, `Imagen`, `Nombre_Padre`, `Telefono_Padre`, `Nombre_Madre`, `Telefono_Madre`, `Contacto`, `Categoria`) VALUES
(12, 'Alejandro Velasco', 12, '2016-10-03', '2021-09-30', '2021-09-30', 'Screenshot_20210818-090152_Photos.jpg', 'Miguel Velasco', '78787877', 'null', '45959551', '1232456789', 5),
(13, 'Fernando Díaz', 7, '2014-10-03', '2021-09-30', '2021-09-30', '2020-05-21_13.12.09.png', 'Daniel Díaz', 'null', 'null', 'null', 'ddiaz@gmail.com', 5),
(14, 'Javier Avelar', 12, '2012-12-12', '2021-09-30', '2021-09-30', NULL, 'null', 'null', 'null', 'null', 'javelar@gmail.com', 5),
(17, 'Javier Vega', 10, '2021-10-03', '2021-10-03', '2021-10-03', NULL, 'null', 'null', 'null', 'null', 'jvega@gmail.com', 5),
(18, 'Daniel Hernández', 15, '2006-10-03', '2021-10-03', '2021-10-03', NULL, 'null', 'null', 'null', 'null', 'dhrnndz@gmail.com', 5),
(20, 'Miguel Lopez', 7, '2013-12-05', '2021-10-09', '2021-10-09', NULL, 'Juan', 'null', 'null', 'null', 'jlopez@gmail.com', 1),
(23, 'Diego', 10, '2011-10-09', '2021-10-10', '2021-10-10', '', 'Juan', 'null', 'null', 'null', 'juancin@gmail.com', 3),
(24, 'Luis Miranda', 14, '2008-02-22', '2021-10-10', '2021-10-10', '', 'Luis', 'null', 'null', '64', 'renefernando2001@gmail.com', 5),
(27, 'Diego Alvarenga', 18, '2002-12-11', '2021-10-11', '2021-10-11', '', 'Juan Alcachofa', '78767876', 'Hola mundo', '78766543', 'diego.alvarengahercules@gmail.com', 4),
(28, 'Diego Alvarenga', 18, '2002-12-11', '2021-10-14', '2021-10-14', 'Screenshot_1.png', 'Juan', '78767878', 'Marta', '75656656', 'diego.alvarengahercues@gmail.com', 30),
(29, 'messi', 10, '2020-11-24', '2021-10-14', '2021-10-14', '', 'jose', '22760808', 'tita', 'null', 'jsra09@gmail.com', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `ID` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Alumno` varchar(220) NOT NULL,
  `Asistencia` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`ID`, `Fecha`, `Alumno`, `Asistencia`) VALUES
(7, '2021-10-04', '12', 'Presente'),
(8, '2021-10-03', '12', 'Ausente'),
(9, '2021-10-15', '17', 'Presente'),
(10, '2021-10-07', '12', 'Presente'),
(11, '2021-10-05', '12', 'Ausente'),
(12, '2021-10-09', '17', 'Presente'),
(13, '2021-10-09', '12', 'Presente'),
(14, '2021-10-09', '13', 'Ausente'),
(15, '2021-10-10', '17', 'Ausente'),
(19, '2021-10-12', '18', 'Presente'),
(20, '2021-10-08', '12', 'Presente'),
(21, '2021-10-10', '12', 'Presente'),
(22, '2021-10-10', '13', 'Presente'),
(23, '2021-10-10', '14', 'Ausente'),
(24, '2021-10-11', '17', 'Ausente'),
(25, '2021-10-10', '20', 'Ausente'),
(26, '2021-10-29', '12', 'Ausente'),
(27, '2021-10-29', '20', 'Presente'),
(28, '2021-10-07', '20', 'Presente'),
(29, '2021-10-09', '20', 'Ausente'),
(30, '2021-10-08', '20', 'Presente'),
(31, '2021-10-10', '18', 'Presente'),
(32, '2021-10-10', '24', 'Presente'),
(33, '2021-10-10', '23', 'Presente'),
(34, '2021-10-06', '20', 'Ausente'),
(35, '2021-10-12', '20', 'Presente'),
(36, '2021-10-11', '20', 'Ausente'),
(39, '2021-10-12', '27', 'Presente'),
(40, '2021-10-14', '27', 'Presente'),
(41, '2021-10-14', '28', 'Presente'),
(42, '2021-10-09', '29', 'Presente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `ID` int(11) NOT NULL,
  `Cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`ID`, `Cargo`) VALUES
(1, 'Profesor'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(220) NOT NULL,
  `Subtitulo` varchar(220) NOT NULL,
  `Contenido` varchar(220) NOT NULL,
  `Profesor` varchar(220) NOT NULL,
  `Imagen` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID`, `Titulo`, `Subtitulo`, `Contenido`, `Profesor`, `Imagen`) VALUES
(1, 'Categoría U5', 'Para niños de 3 a 5 año', 'Esta categoría es para los niños que tienen entre 4 y 5 años que quieren practicar football soccer', '6', 'edu_image2.jpeg'),
(2, 'Categoría U7', 'Para niños de 6 y 7 años', 'Esta categoría es para los niños que tienen entre 6 y 7 años que quieren practicar football soccer', '10', 'edu_image4.jpeg'),
(3, 'Categoría U9', 'Para niños de 8 y 9 años', 'Esta categoría es para los niños que tienen entre 8 y 9 que quieren practicar football soccer', '14', 'edu_image5.jpg'),
(4, 'Categoría U12', 'Para niños de 10 a 12 años', 'Esta categoría es para los niños que tienen entre 10 y 11 que quieren practicar football soccer', '11', 'edu_image6.jpeg'),
(5, 'Categoría U15', 'Para niños de 13 a 16 años', 'Esta categoría es para los niños que tienen entre 13 a 16 años y quieren practicar football soccer', '1', 'img3.jpeg'),
(30, 'Categoria U17', 'Mayores de 18', 'Informatica', '16', 'Screenshot_1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(220) NOT NULL,
  `Contenido` varchar(220) NOT NULL,
  `Imagen` varchar(220) NOT NULL,
  `Icono` varchar(220) NOT NULL,
  `Enlace` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`ID`, `Titulo`, `Contenido`, `Imagen`, `Icono`, `Enlace`) VALUES
(1, 'Facebook', 'Síguenos en Facebook para mas información', 'edu_logo.png', 'fab fa-facebook-f', 'https://www.facebook.com/Edusoccer-361674994283988/?modal=admin_todo_tour'),
(2, 'WhatsApp', 'Escríbenos al WhatsApp para mayor información', 'edu_matricula.jpeg', 'fab fa-whatsapp', 'https://chat.whatsapp.com/IAz0DvQljoWEQ6VZNfb6ykx'),
(3, 'Nos Ubicamos', 'En las canchas de la Universidad Albert Einstein', 'img2.jpeg', 'fas fa-map-marker-alt', 'https://goo.gl/maps/ZQAURhtrM2qYuChJ9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `ID` int(11) NOT NULL,
  `Estado` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`ID`, `Estado`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia`
--

CREATE TABLE `historia` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(220) NOT NULL,
  `Subtitulo` varchar(220) NOT NULL,
  `Contenido` varchar(220) NOT NULL,
  `Imagen` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historia`
--

INSERT INTO `historia` (`ID`, `Titulo`, `Subtitulo`, `Contenido`, `Imagen`) VALUES
(1, 'Inicio de la academia Edusoccer', '21 de octubre del 2017', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!', 'Entreno.jpg'),
(2, 'Copa San Marcelino', '27 de Junio del 2018', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!', 'Copa_San_Marcelino.jpg'),
(3, 'Primer partido Internacional', '21 de octubre del 2018', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!', 'img2.jpeg'),
(4, 'Regreso a entrenos después la cuarentena', '19 de septiembre del 2020', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!', 'regreso.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `ID` int(11) NOT NULL,
  `Alumno` varchar(220) NOT NULL,
  `Fecha` date NOT NULL,
  `Cobro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`ID`, `Alumno`, `Fecha`, `Cobro`) VALUES
(1, '12', '2021-09-01', 30),
(2, '13', '2021-09-01', 30),
(3, '14', '2021-09-01', 30),
(4, '17', '2021-09-01', 30),
(5, '18', '2021-09-01', 30),
(6, '12', '2021-10-01', 30),
(7, '13', '2021-10-01', 30),
(9, '12', '2021-10-07', 100),
(10, '12', '2021-10-09', 40),
(12, '12', '2021-10-11', 20),
(13, '17', '2021-10-02', 30),
(14, '13', '2021-10-13', 60),
(15, '27', '2021-10-14', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recordatorios`
--

CREATE TABLE `recordatorios` (
  `ID` int(11) NOT NULL,
  `Inicio` date NOT NULL,
  `Fin` date NOT NULL,
  `Alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recordatorios`
--

INSERT INTO `recordatorios` (`ID`, `Inicio`, `Fin`, `Alumno`) VALUES
(1, '2021-10-01', '2021-10-31', 17),
(2, '2021-10-01', '2021-10-31', 18),
(3, '2021-10-01', '2021-10-31', 20),
(4, '2021-10-01', '2021-10-31', 24),
(5, '2021-10-01', '2021-10-31', 23),
(6, '2021-10-01', '2021-10-31', 25),
(7, '2021-10-01', '2021-10-31', 27),
(8, '2021-10-01', '2021-10-31', 28),
(9, '2021-10-01', '2021-10-31', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(220) NOT NULL,
  `Contenido` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`ID`, `Titulo`, `Contenido`) VALUES
(1, 'Horarios', 'Los horarios son los sábados de 8:30 a 11:00'),
(2, 'Categorías', 'Contamos con una gran variedad de categorias desde U5 para los mas pequeños hasta U15 para los mas grandes.'),
(3, 'Ubicación', 'Los entrenamientos se realizan en las canchas de la Universidad Albert Einstein.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `ID` int(11) NOT NULL,
  `Imagen` varchar(220) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`ID`, `Imagen`, `Estado`) VALUES
(1, '5.jpg', 2),
(12, '3 (1).jpg', 2),
(13, '2.jpg', 2),
(14, '1.jpg', 2),
(15, '4.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Usuario` varchar(220) NOT NULL,
  `Pass` varchar(220) NOT NULL,
  `Nombre` varchar(220) NOT NULL,
  `Apellido` varchar(220) NOT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Cargo` int(11) NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Usuario`, `Pass`, `Nombre`, `Apellido`, `Edad`, `Cargo`, `Estado`) VALUES
(1, 'academiaedusoccer@gmail.com', 'c8f493f4b318c07b18ddcae64c2548d0', 'José Salvador', 'Ramírez Abarca', 38, 2, 1),
(6, 'ACastro', '81dc9bdb52d04dc20036dbd8313ed055', 'Andrés', 'Castro', 30, 1, 1),
(7, 'SRamirez', '7fbbb8e66c846b59e9da01792d42d0c4', 'Salvador', 'Ramírez', 30, 1, 1),
(8, 'MCano', '81dc9bdb52d04dc20036dbd8313ed055', 'Mario', 'Cano', 30, 1, 1),
(9, 'LEscalante', '81dc9bdb52d04dc20036dbd8313ed055', 'Luis', 'Escalante', 30, 1, 1),
(15, 'Amilgar', '91dfc0fb177a6d5417eb392b51396662', 'Amilgar', 'Amilgar', 25, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `recordatorios`
--
ALTER TABLE `recordatorios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `usuarios_ibfk_1` (`Cargo`),
  ADD KEY `usuarios_ibfk_2` (`Estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historia`
--
ALTER TABLE `historia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `recordatorios`
--
ALTER TABLE `recordatorios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

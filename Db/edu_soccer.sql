-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2021 a las 01:24:40
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `edu_soccer`
--

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
  `Contacto` int(11) NOT NULL,
  `Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID`, `Nombre`, `Edad`, `Fecha_Nacimiento`, `Fecha_Ingreso`, `Fecha_Matricula`, `Imagen`, `Nombre_Padre`, `Telefono_Padre`, `Nombre_Madre`, `Telefono_Madre`, `Contacto`, `Categoria`) VALUES
(12, 'Alejandro Velasco', 5, '2016-10-03', '2021-09-30', '2021-09-30', NULL, 'Miguel Velasco', '78787877', 'null', 'null', 72727272, 1),
(13, 'Fernando Díaz', 7, '2014-10-03', '2021-09-30', '2021-09-30', NULL, 'Daniel Díaz', 'null', 'null', 'null', 12121212, 2),
(14, 'Javier Avelar', 12, '2012-12-12', '2021-09-30', '2021-09-30', '', 'null', 'null', 'null', 'null', 12121212, 4),
(17, 'Javier Vega', 10, '2021-10-03', '2021-10-03', '2021-10-03', '', 'null', 'null', 'null', 'null', 78787878, 3),
(18, 'Daniel Hernández', 15, '2006-10-03', '2021-10-03', '2021-10-03', NULL, 'null', 'null', 'null', 'null', 78787878, 5);

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
(8, '2021-10-03', '12', 'Ausente');

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
(1, 'Categoría U5', 'Para niños de 3 a 5 años', 'Esta categoría es para los niños que tienen entre 4 y 5 años que quieren practicar football soccer', '5', 'edu_image2.jpeg'),
(2, 'Categoría U7', 'Para niños de 6 y 7 años', 'Esta categoría es para los niños que tienen entre 6 y 7 años que quieren practicar football soccer', '6', 'edu_image4.jpeg'),
(3, 'Categoria U9', 'Para niños de 8 y 9 años', 'Esta categoría es para los niños que tienen entre 8 y 9 que quieren practicar football soccer', '7', 'edu_image5.jpg'),
(4, 'Categoría U12', 'Para niños de 10 a 12 años', 'Esta categoría es para los niños que tienen entre 10 y 11 que quieren practicar football soccer', '8', 'edu_image6.jpeg'),
(5, 'Categoría U15', 'Para niños de 12 a 15 años', 'Esta categoría es para los niños que tienen entre 12 a 15 años y quieren practicar football soccer', '9', 'img3.jpeg');

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
(7, '13', '2021-10-01', 30);

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
(3, 'FBlanco', '85e6314bbe299502162a9d3b49dd4854', 'Fidel Alejandro', 'Blanco', 18, 1, 1),
(5, 'AReyes', 'adb28b55979f4c8ff3c1f2eac74ba698', 'Amilcar', 'Reyes', 30, 1, 1),
(6, 'AGonzalez', '2ea3d772a3aa68ae88dfe2a8d4c77e0c', 'Andrés', 'González', 30, 1, 1),
(7, 'SRamirez', '7fbbb8e66c846b59e9da01792d42d0c4', 'Salvador', 'Ramírez', 30, 1, 1),
(8, 'MLopez', 'fcc2aa6cdb96cbbb1d6bcc1c4bc19a48', 'Mario', 'López', 30, 1, 1),
(9, 'LAndrade', '6e84ecee5715602ca8e6dbb719da014e', 'Luis', 'Andrade', 30, 1, 1);

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
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

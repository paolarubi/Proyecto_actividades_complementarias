-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2017 a las 17:59:33
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solicitud_actividad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_comp`
--

CREATE TABLE `actividad_comp` (
  `Num_actividad` int(11) NOT NULL,
  `Nombre_actividad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad_comp`
--

INSERT INTO `actividad_comp` (`Num_actividad`, `Nombre_actividad`) VALUES
(1, 'Musica'),
(4, 'Futbol soccer'),
(5, 'Manualidades'),
(6, 'Danza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `Clave_carrera` varchar(25) NOT NULL,
  `Nombre_carrera` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`Clave_carrera`, `Nombre_carrera`) VALUES
('11', 'DERECHO'),
('15', 'dentista'),
('18', 'Medicina'),
('22', 'chef'),
('3', 'Ingenieria en agronomia'),
('300', 'Agropecuaria'),
('4', 'Ingenieria en Informatica'),
('5', 'Licenciatura en Administracion'),
('50', 'Artes marciales'),
('54', 'veterinaria'),
('6', 'Licenciatura en Biologia'),
('65', 'Mecatronica'),
('7', 'Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Clave_departamento` int(11) NOT NULL,
  `Nombre_departamento` varchar(50) NOT NULL,
  `Trabajador_rfc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`Clave_departamento`, `Nombre_departamento`, `Trabajador_rfc`) VALUES
(1, 'Desarrollo academico', 'KLJH1231234'),
(2, 'Vinculacion y gestion', 'HGFD432678987');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `Num_control` int(11) NOT NULL,
  `Nombre_estudiante` varchar(45) NOT NULL,
  `Apellido_p_estudiante` varchar(45) NOT NULL,
  `Apellido_m_estudiante` varchar(45) NOT NULL,
  `Semestre` varchar(10) NOT NULL,
  `Firma` varchar(45) DEFAULT NULL,
  `Carrera_Clave` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`Num_control`, `Nombre_estudiante`, `Apellido_p_estudiante`, `Apellido_m_estudiante`, `Semestre`, `Firma`, `Carrera_Clave`) VALUES
(15930164, 'Lucas Alberto', 'Alonso', 'Cruz', 'V', ' NULL', '4'),
(15930167, 'Paola Rubi', 'Benitez', 'Bartolo', 'V', ' NULL', '4'),
(15930178, 'Ernesto Quintín', 'García', 'Pineda', 'V', ' NULL', '4'),
(15930185, 'Alondra', 'Jaimes', 'Gutierrez', 'V', ' NULL', '4'),
(15930200, 'Jose Ramon', 'Ortiz', 'Lopez', 'V', ' NULL', '4'),
(15930210, 'Carlos Alberto ', 'Ruiz', 'Gutierrez', 'V', ' NULL', '4'),
(15930218, 'Jonatan', 'Urieta', 'Albarran', 'V', ' NULL', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituto`
--

CREATE TABLE `instituto` (
  `Clave_instituto` varchar(15) NOT NULL,
  `Nombre_instituto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instituto`
--

INSERT INTO `instituto` (`Clave_instituto`, `Nombre_instituto`) VALUES
('12DST885', 'Instituto Tecnologico de Cd Altamirano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `RFC_instructor` varchar(20) NOT NULL,
  `Nombre_instructor` varchar(45) DEFAULT NULL,
  `Apellido_p_instructor` varchar(45) DEFAULT NULL,
  `Apellido_m_instructor` varchar(45) DEFAULT NULL,
  `actividad_complement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`RFC_instructor`, `Nombre_instructor`, `Apellido_p_instructor`, `Apellido_m_instructor`, `actividad_complement`) VALUES
('1JAS2345', 'pablo', 'perez', 'perez', 5),
('JKL12322', 'Pancho', 'Robles', 'Macedo', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `Folio` int(11) NOT NULL,
  `Asunto` varchar(45) NOT NULL,
  `Lugar` varchar(45) NOT NULL,
  `Fecha` date NOT NULL,
  `Estudiante_Num_control` int(11) NOT NULL,
  `Instructor_RFC` varchar(20) NOT NULL,
  `Departamento_Clave` int(11) NOT NULL,
  `Instituto_Clave` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`Folio`, `Asunto`, `Lugar`, `Fecha`, `Estudiante_Num_control`, `Instructor_RFC`, `Departamento_Clave`, `Instituto_Clave`) VALUES
(282, 'Inscrip', 'eee', '2017-10-19', 15930164, 'JKL12322', 1, '12DST885');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `RFC_trabajador` varchar(20) NOT NULL,
  `Nombre_trabajador` varchar(45) NOT NULL,
  `Apellido_p_trabajador` varchar(45) NOT NULL,
  `Apellido_m_trabajador` varchar(45) NOT NULL,
  `clave_presupuestal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`RFC_trabajador`, `Nombre_trabajador`, `Apellido_p_trabajador`, `Apellido_m_trabajador`, `clave_presupuestal`) VALUES
('HGFD432678987', 'Pepe', 'hernandez', 'perez', 1223),
('JAHA1345566', 'Hernan', 'Santana', 'Benitez', 12222),
('KLJH1231234', 'Raul', 'Torres', 'Gonza', 2222);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad_comp`
--
ALTER TABLE `actividad_comp`
  ADD PRIMARY KEY (`Num_actividad`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`Clave_carrera`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Clave_departamento`),
  ADD KEY `fk_Departamento_trabajador1_idx` (`Trabajador_rfc`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`Num_control`),
  ADD KEY `fk_Estudiante_Carrera1_idx` (`Carrera_Clave`);

--
-- Indices de la tabla `instituto`
--
ALTER TABLE `instituto`
  ADD PRIMARY KEY (`Clave_instituto`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`RFC_instructor`),
  ADD KEY `fk_Instructor_Actividad_comp1_idx` (`actividad_complement`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `fk_Solicitud_Estudiante1_idx` (`Estudiante_Num_control`),
  ADD KEY `fk_Solicitud_Instructor1_idx` (`Instructor_RFC`),
  ADD KEY `fk_Solicitud_Departamento1_idx` (`Departamento_Clave`),
  ADD KEY `fk_Solicitud_Instituto1_idx` (`Instituto_Clave`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`RFC_trabajador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `Folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_Departamento_trabajador1` FOREIGN KEY (`Trabajador_rfc`) REFERENCES `trabajador` (`RFC_trabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_Estudiante_Carrera1` FOREIGN KEY (`Carrera_Clave`) REFERENCES `carrera` (`Clave_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `fk_Instructor_Actividad_comp1` FOREIGN KEY (`actividad_complement`) REFERENCES `actividad_comp` (`Num_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_Solicitud_Departamento1` FOREIGN KEY (`Departamento_Clave`) REFERENCES `departamento` (`Clave_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Solicitud_Estudiante1` FOREIGN KEY (`Estudiante_Num_control`) REFERENCES `estudiante` (`Num_control`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Solicitud_Instituto1` FOREIGN KEY (`Instituto_Clave`) REFERENCES `instituto` (`Clave_instituto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Solicitud_Instructor1` FOREIGN KEY (`Instructor_RFC`) REFERENCES `instructor` (`RFC_instructor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

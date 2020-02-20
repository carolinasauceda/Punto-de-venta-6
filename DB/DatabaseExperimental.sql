-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-02-2020 a las 21:19:26
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `puntoventa`
--
CREATE DATABASE IF NOT EXISTS `puntoventa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `puntoventa`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CategoriaProductos`
--

CREATE TABLE `CategoriaProductos` (
  `IDCategoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Foto` mediumblob DEFAULT NULL,
  `RActivo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE `Clientes` (
  `IDCliente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido_P` varchar(50) DEFAULT NULL,
  `Apellido_M` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `RActivo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Clientes`
--

INSERT INTO `Clientes` (`IDCliente`, `Nombre`, `Apellido_P`, `Apellido_M`, `Correo`, `Telefono`, `RActivo`) VALUES
(1, 'Ambrocio Isaias', 'Laureano', 'Castro', 'ambrocioisaias98@gmail.com', '8683019942', 1),
(2, 'Ingrid Carolina', 'Sauceda', 'Peña', 'correo@gmail.com', '8683019942', 1),
(3, 'Lyvan Alejandro', 'Lumbrera', 'Hernandez', 'correo@gmail.com', '8683019942', 1),
(4, 'Jose', 'Sauceda', 'Peña', 'correo@gmail.com', '8683019942', 1),
(5, 'Armando', 'Sauceda', 'Peña', 'correo@gmail.com', '8683019942', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DetallesVenta`
--

CREATE TABLE `DetallesVenta` (
  `IDDetallesV` int(11) NOT NULL,
  `IDVenta` int(11) NOT NULL,
  `IDProducto` varchar(50) NOT NULL,
  `PrecioUnitario` decimal(7,2) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleados`
--

CREATE TABLE `Empleados` (
  `IDEmpleado` varchar(25) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido_P` varchar(50) NOT NULL,
  `Apellido_M` varchar(50) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Fecha_Contratacion` date NOT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Empleados`
--

INSERT INTO `Empleados` (`IDEmpleado`, `Nombre`, `Apellido_P`, `Apellido_M`, `Fecha_Nacimiento`, `Fecha_Contratacion`, `Direccion`, `Telefono`, `Estado`) VALUES
('AILC2020', 'Ambrocio Isaias ', 'Laureano ', 'Castro', '1998-07-06', '2020-02-18', 'Mi casa', '8683019942', 'Contratado'),
('ICSP2020', 'Ingrid Carolina', 'Sauceda', 'Peña', '2020-02-20', '2020-02-20', 'SU casa', '8683019942', 'Contratado'),
('LALH2020', 'Lyvan Alejandro', 'Lumbreras ', 'Hernandez', '2020-02-05', '2020-02-20', 'Su casa', '8683019942', 'Contratado'),
('PEPE2020', 'Pepe', 'Esteban', 'Eleno', '2020-02-05', '2020-02-13', 'no se', '8683019942', 'Contratado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NivelUsuario`
--

CREATE TABLE `NivelUsuario` (
  `IDNivel` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `NivelUsuario`
--

INSERT INTO `NivelUsuario` (`IDNivel`, `Descripcion`, `Nivel`) VALUES
(1, 'Administrador', 100),
(2, 'Empleado', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `IDProducto` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `IDProveedor` int(11) NOT NULL,
  `IDCategoria` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioUnitario` decimal(7,2) NOT NULL,
  `EnExistencia` int(11) NOT NULL,
  `BajoPedido` int(11) NOT NULL,
  `RActivo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedores`
--

CREATE TABLE `Proveedores` (
  `IDProveedor` int(11) NOT NULL,
  `Compania` varchar(50) NOT NULL,
  `Contacto` varchar(50) NOT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `RActivo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `IDUsuario` varchar(25) NOT NULL,
  `NivelUsuario` int(11) NOT NULL,
  `Clave` varchar(25) NOT NULL,
  `Activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`IDUsuario`, `NivelUsuario`, `Clave`, `Activo`) VALUES
('AILC2020', 1, 'varela', 1),
('ICSP2020', 1, '1234', 1),
('LALH2020', 1, '1234', 1),
('PEPE2020', 2, '1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ventas`
--

CREATE TABLE `Ventas` (
  `IDVenta` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `IDEmpleado` varchar(25) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Total` decimal(7,2) NOT NULL,
  `Efectivo` decimal(7,2) NOT NULL,
  `Cambio` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CategoriaProductos`
--
ALTER TABLE `CategoriaProductos`
  ADD PRIMARY KEY (`IDCategoria`);

--
-- Indices de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`IDCliente`);

--
-- Indices de la tabla `DetallesVenta`
--
ALTER TABLE `DetallesVenta`
  ADD PRIMARY KEY (`IDDetallesV`),
  ADD KEY `IDVenta` (`IDVenta`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `Empleados`
--
ALTER TABLE `Empleados`
  ADD PRIMARY KEY (`IDEmpleado`);

--
-- Indices de la tabla `NivelUsuario`
--
ALTER TABLE `NivelUsuario`
  ADD PRIMARY KEY (`IDNivel`);

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`IDProducto`),
  ADD KEY `IDProveedor` (`IDProveedor`),
  ADD KEY `IDCategoria` (`IDCategoria`);

--
-- Indices de la tabla `Proveedores`
--
ALTER TABLE `Proveedores`
  ADD PRIMARY KEY (`IDProveedor`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`IDUsuario`),
  ADD KEY `NivelUsuario` (`NivelUsuario`);

--
-- Indices de la tabla `Ventas`
--
ALTER TABLE `Ventas`
  ADD PRIMARY KEY (`IDVenta`),
  ADD KEY `IDCliente` (`IDCliente`),
  ADD KEY `IDEmpleado` (`IDEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CategoriaProductos`
--
ALTER TABLE `CategoriaProductos`
  MODIFY `IDCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `DetallesVenta`
--
ALTER TABLE `DetallesVenta`
  MODIFY `IDDetallesV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `NivelUsuario`
--
ALTER TABLE `NivelUsuario`
  MODIFY `IDNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Proveedores`
--
ALTER TABLE `Proveedores`
  MODIFY `IDProveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Ventas`
--
ALTER TABLE `Ventas`
  MODIFY `IDVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `DetallesVenta`
--
ALTER TABLE `DetallesVenta`
  ADD CONSTRAINT `DetallesVenta_ibfk_1` FOREIGN KEY (`IDVenta`) REFERENCES `Ventas` (`IDVenta`) ON DELETE CASCADE,
  ADD CONSTRAINT `DetallesVenta_ibfk_2` FOREIGN KEY (`IDProducto`) REFERENCES `Productos` (`IDProducto`);

--
-- Filtros para la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD CONSTRAINT `Productos_ibfk_1` FOREIGN KEY (`IDProveedor`) REFERENCES `Proveedores` (`IDProveedor`),
  ADD CONSTRAINT `Productos_ibfk_2` FOREIGN KEY (`IDCategoria`) REFERENCES `CategoriaProductos` (`IDCategoria`);

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`NivelUsuario`) REFERENCES `NivelUsuario` (`IDNivel`);

--
-- Filtros para la tabla `Ventas`
--
ALTER TABLE `Ventas`
  ADD CONSTRAINT `Ventas_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `Clientes` (`IDCliente`),
  ADD CONSTRAINT `Ventas_ibfk_2` FOREIGN KEY (`IDEmpleado`) REFERENCES `Empleados` (`IDEmpleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-02-2020 a las 18:38:17
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

CREATE TABLE IF NOT EXISTS `CategoriaProductos` (
  `IDCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `RActivo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `CategoriaProductos`
--

INSERT INTO `CategoriaProductos` (`IDCategoria`, `Nombre`, `Descripcion`, `RActivo`) VALUES
(9, 'Productos de limpieza', 'Todo lo relacionado a productos de Limpieza', 1),
(10, 'Higiene', 'Relacionado a higiene y aseo personal', 1),
(11, 'Lacteos', '', 1),
(12, 'Farmaceutica', 'Todo aquello relacionado a productos medicos', 1),
(13, 'Bebidas', 'Refrescos o bebidas de sabor', 1),
(14, 'Panaderia', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE IF NOT EXISTS `Clientes` (
  `IDCliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apellido_P` varchar(50) DEFAULT NULL,
  `Apellido_M` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `RActivo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Clientes`
--

INSERT INTO `Clientes` (`IDCliente`, `Nombre`, `Apellido_P`, `Apellido_M`, `Correo`, `Telefono`, `RActivo`) VALUES
(1, 'Ambrocio Isaias', 'Laureano ', 'Castro', 'ambrocioisaias98@gmail.com', '8683019942', 1),
(2, 'Ingrid Carolina', 'Sauceda', 'Peña', 'carolinasauceda@gmail.com', '8683019943', 1),
(3, 'Lyvan Alejandro', 'Lumbreras', 'Hernandez', 'lyvan@gmail.com', '8683019944', 1),
(4, 'Sebastian', 'Laureano ', 'Castro', 'sebastian@gmail.com', '8683019942', 1),
(5, 'Karin', 'Laureano', 'Castro', 'Karin98@gmail.com', '8683098876', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DetallesVenta`
--

CREATE TABLE IF NOT EXISTS `DetallesVenta` (
  `IDDetallesV` int(11) NOT NULL AUTO_INCREMENT,
  `IDVenta` int(11) NOT NULL,
  `IDProducto` varchar(50) NOT NULL,
  `PrecioUnitario` decimal(7,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`IDDetallesV`),
  KEY `IDVenta` (`IDVenta`),
  KEY `IDProducto` (`IDProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleados`
--

CREATE TABLE IF NOT EXISTS `Empleados` (
  `IDEmpleado` varchar(25) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido_P` varchar(50) NOT NULL,
  `Apellido_M` varchar(50) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Fecha_Contratacion` date NOT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `NivelUsuario` int(11) NOT NULL,
  `Clave` varchar(25) NOT NULL,
  `RActivo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDEmpleado`),
  KEY `NivelUsuario` (`NivelUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Empleados`
--

INSERT INTO `Empleados` (`IDEmpleado`, `Nombre`, `Apellido_P`, `Apellido_M`, `Fecha_Nacimiento`, `Fecha_Contratacion`, `Direccion`, `Telefono`, `NivelUsuario`, `Clave`, `RActivo`) VALUES
('AILC2020', 'Ambrocio Isaias', 'Laureano', 'Castro', '1998-07-06', '2020-02-03', 'Mi casa', '8683019942', 1, 'varela', 1),
('ICSP2020', 'Ingrid Carolina', 'Sauceda', 'Peña', '1998-09-27', '2020-02-03', 'Su Casa', '8683019942', 1, 'ICSP2020', 1),
('LALH2020', 'Lyvan Alejandro', 'Lumbreras', 'Hernandez', '1998-09-09', '2020-02-03', 'Su Casa', '8683019942', 1, 'LALH2020', 1),
('PEPE2020', 'Pepe', 'Esteban', 'Sanchez', '2020-02-04', '2020-02-11', 'Su casa', '8683019934', 2, 'PEPE2020', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NivelUsuario`
--

CREATE TABLE IF NOT EXISTS `NivelUsuario` (
  `IDNivel` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `Nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE IF NOT EXISTS `Productos` (
  `IDProducto` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `IDProveedor` int(11) NOT NULL,
  `IDCategoria` int(11) NOT NULL,
  `PrecioUnitario` decimal(7,2) NOT NULL,
  `EnExistencia` int(11) NOT NULL,
  `BajoPedido` int(11) NOT NULL,
  `Foto` mediumblob DEFAULT NULL,
  `RActivo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDProducto`),
  KEY `IDProveedor` (`IDProveedor`),
  KEY `IDCategoria` (`IDCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Productos`
--

INSERT INTO `Productos` (`IDProducto`, `Nombre`, `IDProveedor`, `IDCategoria`, `PrecioUnitario`, `EnExistencia`, `BajoPedido`, `Foto`, `RActivo`) VALUES
('0bd4a8de-f471-4309-9b74-f4975a3ebbf3', 'Pan tajado 500g', 1, 14, '20.00', 30, 50, NULL, 1),
('4cc0d046-8cb3-49d5-8d79-2ee26d483eb0', 'Refresco Coca-Cola 500ml', 2, 13, '10.50', 500, 100, NULL, 1),
('7b095654-67a7-4e88-9c1b-412f8b42d1b7', 'Donas Bimbo 100g', 1, 14, '10.50', 30, 0, NULL, 1),
('a5f86f43-8580-4b67-a44c-1d7d45d94954', 'Refresco Pepsi 1L', 4, 13, '23.50', 400, 200, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedores`
--

CREATE TABLE IF NOT EXISTS `Proveedores` (
  `IDProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `Compania` varchar(50) NOT NULL,
  `Contacto` varchar(50) NOT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `RActivo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Proveedores`
--

INSERT INTO `Proveedores` (`IDProveedor`, `Compania`, `Contacto`, `Correo`, `Telefono`, `RActivo`) VALUES
(1, 'Bimbo', 'Jose Luis Gonzalez Iresti', 'bimbo@gmail.com', '8684029876', 1),
(2, 'CocaCola', 'Alberto Martinez Sabadiel', 'cocacolacompany@gmail.com', '8683987754', 1),
(3, 'Gamesa', 'Hernesto Capuchino Samafon', 'gamesa@gmail.com', '8684037753', 1),
(4, 'Pepsi', 'Gabriel Melendez Hernandez', 'pepsico@gmail.com', '8647235684', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ventas`
--

CREATE TABLE IF NOT EXISTS `Ventas` (
  `IDVenta` int(11) NOT NULL AUTO_INCREMENT,
  `IDCliente` int(11) NOT NULL,
  `IDEmpleado` varchar(25) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Total` decimal(7,2) NOT NULL,
  `Efectivo` decimal(7,2) NOT NULL,
  `Cambio` decimal(7,2) NOT NULL,
  PRIMARY KEY (`IDVenta`),
  KEY `IDCliente` (`IDCliente`),
  KEY `IDEmpleado` (`IDEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Filtros para la tabla `Empleados`
--
ALTER TABLE `Empleados`
  ADD CONSTRAINT `Empleados_ibfk_1` FOREIGN KEY (`NivelUsuario`) REFERENCES `NivelUsuario` (`IDNivel`);

--
-- Filtros para la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD CONSTRAINT `Productos_ibfk_1` FOREIGN KEY (`IDProveedor`) REFERENCES `Proveedores` (`IDProveedor`),
  ADD CONSTRAINT `Productos_ibfk_2` FOREIGN KEY (`IDCategoria`) REFERENCES `CategoriaProductos` (`IDCategoria`);

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

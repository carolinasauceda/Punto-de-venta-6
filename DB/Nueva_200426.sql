-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-04-2020 a las 22:57:24
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CategoriaProductos`
--

CREATE TABLE `CategoriaProductos` (
  `IDCategoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `RActivo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `CategoriaProductos`
--

INSERT INTO `CategoriaProductos` (`IDCategoria`, `Nombre`, `Descripcion`, `RActivo`) VALUES
(33, 'Panaderia', 'Panes dulces :v', 1),
(34, 'Refrescos', 'Bebidas carbonatadas', 0),
(35, 'Frituras', 'fritos :V', 0),
(36, 'Dulceria', 'Dulces', 0),
(38, 'Ambrocio Isaias', 'o', 1),
(39, 'Jugueteria', 'Juguetitos :v', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE `Clientes` (
  `RFC` varchar(13) NOT NULL,
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

INSERT INTO `Clientes` (`RFC`, `Nombre`, `Apellido_P`, `Apellido_M`, `Correo`, `Telefono`, `RActivo`) VALUES
('0000000000000', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 1),
('LACA980706L12', 'Ambrocio Isaias', 'Laureano', 'Castro', 'ambrocioisaias98@gmail.com', '8683019942', 0),
('LACA980706L98', 'Ambrocio Isaias', 'Laureano', 'Castro', 'ambrocioisaias98@gmail.com', '8683019943', 1),
('LACA980706LU5', 's', 's', 's', 'ambrocioisaias98@gmail.com', '9', 1),
('LACA980706LU6', 'kkkkk', 'Laureano', 'Castro', 'ambrocioisaias98@gmail.com', '8683019942', 1),
('LACA980706LU8', 'Ambrocio Isaias ', 'Laureano', 'Castro', '', '8683019942', 1),
('LACA980706LU9', 'Ambrocio Isaias', 'a', 'a', 'ambrocioisaias98@gmail.com', '89', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DetallesVenta`
--

CREATE TABLE `DetallesVenta` (
  `IDDetallesV` int(11) NOT NULL,
  `IDVenta` bigint(13) NOT NULL,
  `IDProducto` varchar(50) NOT NULL,
  `PrecioUnitario` decimal(7,2) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `DetallesVenta`
--

INSERT INTO `DetallesVenta` (`IDDetallesV`, `IDVenta`, `IDProducto`, `PrecioUnitario`, `Cantidad`) VALUES
(1, 1587933955272, '1585096169', '10.00', 20),
(2, 1587933955272, '1586190781', '10.00', 20),
(3, 1587934199118, '1585096169', '10.00', 3),
(4, 1587934199118, '1586190781', '2000.00', 6),
(5, 1587934199118, '1586627817', '200.00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleados`
--

CREATE TABLE `Empleados` (
  `IDEmpleado` varchar(25) NOT NULL,
  `RFC` varchar(13) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido_P` varchar(50) NOT NULL,
  `Apellido_M` varchar(50) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Fecha_Contratacion` date NOT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `NivelUsuario` int(11) NOT NULL,
  `Clave` varchar(25) NOT NULL,
  `RActivo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Empleados`
--

INSERT INTO `Empleados` (`IDEmpleado`, `RFC`, `Nombre`, `Apellido_P`, `Apellido_M`, `Fecha_Nacimiento`, `Fecha_Contratacion`, `Direccion`, `Telefono`, `NivelUsuario`, `Clave`, `RActivo`) VALUES
('AILC2020', 'LACA980706L12', 'Ambrocio Isaias', 'Laureano', 'Castro', '2020-03-03', '2020-03-08', 'Calle Oaxaca #31', '8683019943', 1, 'varela', 1),
('CALA2020123166', 'LACA980706L12', 'Ambrocio Isaias', 'Laureano', 'Castro', '2020-12-30', '2020-12-31', 'Calle Oaxaca #31 Col. Esperanza', '8683019942', 1, 'varela', 1),
('PESI2020123180', 'LACA980706LU5', 'Ingrid Carolina', 'Sauceda', 'Pe&ntilde;a', '2020-12-31', '2020-12-31', 'No s&eacute;', '8683019942', 6, 'varela', 0);

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
(2, 'Vendedor', 20),
(4, 'SuperUsuario', 1000),
(6, 'Almacenista', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `IDProducto` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `IDProveedor` int(11) NOT NULL,
  `IDCategoria` int(11) NOT NULL,
  `PrecioUnitario` decimal(7,2) NOT NULL,
  `EnExistencia` int(11) NOT NULL,
  `RActivo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Productos`
--

INSERT INTO `Productos` (`IDProducto`, `Nombre`, `IDProveedor`, `IDCategoria`, `PrecioUnitario`, `EnExistencia`, `RActivo`) VALUES
('1585096169', 'Pepsi 300ml', 2, 33, '10.00', 2359, 1),
('1586190748', 'galvantrix', 2, 33, '200.00', 0, 1),
('1586190781', 'polineciomitrix', 2, 33, '2000.00', 8, 1),
('1586190788', 'Livanitrix', 2, 33, '200.00', 0, 1),
('1586627817', 'Polinecio', 3, 34, '200.00', 37, 1);

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

--
-- Volcado de datos para la tabla `Proveedores`
--

INSERT INTO `Proveedores` (`IDProveedor`, `Compania`, `Contacto`, `Correo`, `Telefono`, `RActivo`) VALUES
(2, 'Pepsi', 'Ambrocio', 'ambrocioisaias98@gmail.com', '8683019943', 1),
(3, 'Coca-Cola', 'Ambrocio', 'ambrocioisaias98@gmail.com', '8683019942', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ventas`
--

CREATE TABLE `Ventas` (
  `IDVenta` bigint(13) NOT NULL,
  `Cliente` varchar(13) NOT NULL,
  `IDEmpleado` varchar(25) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Total` decimal(10,2) NOT NULL,
  `Efectivo` decimal(10,2) NOT NULL,
  `Cambio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Ventas`
--

INSERT INTO `Ventas` (`IDVenta`, `Cliente`, `IDEmpleado`, `Fecha`, `Total`, `Efectivo`, `Cambio`) VALUES
(1587932166566, '0000000000000', 'AILC2020', '2020-04-26 05:00:00', '10.00', '200.00', '190.00'),
(1587933141882, '0000000000000', 'AILC2020', '2020-04-26 05:00:00', '10010.00', '200000.00', '189990.00'),
(1587933437695, '0000000000000', 'AILC2020', '2020-04-26 05:00:00', '4020.00', '200000.00', '195980.00'),
(1587933477735, '0000000000000', 'AILC2020', '2020-04-26 05:00:00', '4020.00', '200000.00', '195980.00'),
(1587933631799, '0000000000000', 'AILC2020', '2020-04-26 05:00:00', '4020.00', '200000.00', '195980.00'),
(1587933813754, '0000000000000', 'AILC2020', '2020-04-26 05:00:00', '4020.00', '200000.00', '195980.00'),
(1587933955272, '0000000000000', 'AILC2020', '2020-04-26 05:00:00', '4020.00', '200000.00', '195980.00'),
(1587934199118, '0000000000000', 'AILC2020', '2020-04-26 05:00:00', '12630.00', '200000.00', '187370.00');

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
  ADD PRIMARY KEY (`RFC`);

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
  ADD PRIMARY KEY (`IDEmpleado`),
  ADD KEY `NivelUsuario` (`NivelUsuario`);

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
-- Indices de la tabla `Ventas`
--
ALTER TABLE `Ventas`
  ADD PRIMARY KEY (`IDVenta`),
  ADD KEY `Cliente` (`Cliente`),
  ADD KEY `IDEmpleado` (`IDEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CategoriaProductos`
--
ALTER TABLE `CategoriaProductos`
  MODIFY `IDCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `DetallesVenta`
--
ALTER TABLE `DetallesVenta`
  MODIFY `IDDetallesV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `NivelUsuario`
--
ALTER TABLE `NivelUsuario`
  MODIFY `IDNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Proveedores`
--
ALTER TABLE `Proveedores`
  MODIFY `IDProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `Ventas_ibfk_1` FOREIGN KEY (`Cliente`) REFERENCES `Clientes` (`RFC`),
  ADD CONSTRAINT `Ventas_ibfk_2` FOREIGN KEY (`IDEmpleado`) REFERENCES `Empleados` (`IDEmpleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

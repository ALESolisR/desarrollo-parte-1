-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2024 a las 03:41:31
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idMarca` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `anioCreacion` int(11) DEFAULT NULL,
  `web` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idMarca`, `nombre`, `pais`, `anioCreacion`, `web`) VALUES
(1, 'Nike', 'Estados Unidos', 1964, 'https://www.nike.com'),
(2, 'Adidas', 'Alemania', 1949, 'https://www.adidas.com'),
(3, 'Zara', 'España', 1975, 'https://www.zara.com'),
(4, 'Gucci', 'Italia', 1921, 'https://www.gucci.com'),
(5, 'H&M', 'Suecia', 1947, 'https://www.hm.com'),
(6, 'Levi\'s', 'Estados Unidos', 1853, 'https://www.levi.com'),
(7, 'Calvin Klein', 'Estados Unidos', 1968, 'https://www.calvinklein.us'),
(8, 'Puma', 'Alemania', 1948, 'https://www.puma.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `idPrenda` int(11) NOT NULL,
  `idMarca` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `talla` varchar(50) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`idPrenda`, `idMarca`, `nombre`, `categoria`, `color`, `talla`, `precio`, `stock`) VALUES
(1, 1, 'Air Max 90', 'Zapatillas', 'Blanco', '40', 150, 50),
(2, 2, 'Superstar', 'Zapatillas', 'Negro', '38', 100, 30),
(3, 3, 'Camisa Cuadros', 'Camisas', 'Azul', 'M', 30, 20),
(4, 4, 'Marmont', 'Bolsos', 'Rojo', 'Única', 800, 10),
(5, 5, 'Jersey Cuello Alto', 'Jerseys', 'Gris', 'L', 50, 15),
(6, 6, '501 Original Fit', 'Jeans', 'Azul', '32x32', 80, 25),
(7, 7, 'Boxer Briefs 3-Pack', 'Ropa Interior', 'Negro', 'M', 25, 40),
(8, 8, 'Future Rider', 'Zapatillas', 'Azul', '41', 90, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `idPrenda` int(11) DEFAULT NULL,
  `fechaVenta` date DEFAULT NULL,
  `cantidadVendida` int(11) DEFAULT NULL,
  `precioUnitario` int(11) DEFAULT NULL,
  `totalVenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `idPrenda`, `fechaVenta`, `cantidadVendida`, `precioUnitario`, `totalVenta`) VALUES
(1, 1, '2024-06-01', 5, 150, 750),
(2, 2, '2024-06-01', 3, 100, 300),
(3, 3, '2024-06-02', 2, 30, 60),
(4, 4, '2024-06-02', 1, 800, 800),
(5, 5, '2024-06-03', 4, 50, 200),
(6, 6, '2024-06-03', 2, 80, 160),
(7, 7, '2024-06-03', 5, 25, 125),
(8, 8, '2024-06-03', 3, 90, 270);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD PRIMARY KEY (`idPrenda`),
  ADD KEY `idMarca` (`idMarca`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `idPrenda` (`idPrenda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `idPrenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD CONSTRAINT `prendas_ibfk_1` FOREIGN KEY (`idMarca`) REFERENCES `marcas` (`idMarca`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idPrenda`) REFERENCES `prendas` (`idPrenda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

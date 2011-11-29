-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2011 a las 02:33:04
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `encuestacafe`
--
CREATE DATABASE `encuestacafe` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `encuestacafe`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafes`
--

CREATE TABLE IF NOT EXISTS `cafes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(25) NOT NULL,
  `puntaje` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `cafes`
--

INSERT INTO `cafes` (`id`, `tipo`, `puntaje`) VALUES
(1, 'Café Premium', 12),
(2, 'Café De la Casa', 10),
(3, 'Café Negro Tostado', 9),
(4, 'Café Orgánico.', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votantes`
--

CREATE TABLE IF NOT EXISTS `votantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sexo` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `ptajeCafe1` int(11) NOT NULL,
  `ptajeCafe2` int(11) NOT NULL,
  `ptajeCafe3` int(11) NOT NULL,
  `ptajeCafe4` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `votantes`
--

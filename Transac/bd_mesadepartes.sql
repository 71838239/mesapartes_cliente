-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-10-2020 a las 10:10:41
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_mesadepartes`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `access_by_idSol_codAc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `access_by_idSol_codAc` (IN `_idSolicitud` INT(11), `_codAcceso` VARCHAR(6))  BEGIN
        
    SELECT * FROM solicitudes WHERE idSolicitud = _idSolicitud AND codAcceso = _codAcceso;
END$$

DROP PROCEDURE IF EXISTS `sp_c_solicitantes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_c_solicitantes` (IN `_DNI` VARCHAR(8), `_nombres` VARCHAR(45), `_apellidoPaterno` VARCHAR(45), `_apellidoMaterno` VARCHAR(45), `_telefono` VARCHAR(45), `_email` VARCHAR(45))  BEGIN
        
    INSERT INTO solicitantes (DNI,nombres,apellidoPaterno,apellidoMaterno,telefono,email) values (_DNI,_nombres,
    _apellidoPaterno,_apellidoMaterno,_telefono,_email);
END$$

DROP PROCEDURE IF EXISTS `sp_c_solicitudes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_c_solicitudes` (IN `_otorgadox` VARCHAR(45), `_afavor` VARCHAR(45), `_RUCNot` VARCHAR(10), `_DNISol` VARCHAR(8), `_DNIUser` VARCHAR(8))  BEGIN
    DECLARE _codAcc varchar(6);
    DECLARE _dniSolR varchar(1);
    DECLARE _dniSolL varchar(1);
    DECLARE _numRand varchar(2);
    DECLARE _apellidopaterno varchar(45);
    DECLARE _apellidomaterno varchar(45);
    DECLARE _aPater varchar(1);
    DECLARE _aMater varchar(1);
    
    SELECT apellidoPaterno into _apellidopaterno FROM solicitantes WHERE DNI = _DNISol;
    SELECT apellidoMaterno into _apellidomaterno FROM solicitantes WHERE DNI = _DNISol;
    
    SET _numRand = FLOOR(10 + RAND() * (99-10));
    SET _dniSolR = RIGHT(_DNISol,1);
    SET _dniSolL = LEFT(_DNISol,1);
    SET _aPater = LEFT(UPPER(_apellidopaterno),1);
    SET _aMater = LEFT(UPPER(_apellidomaterno),1);
    SET _codAcc = concat(_dniSolL,_aPater,_numRand,_aMater,_dniSolR) ;
    
    INSERT INTO solicitudes (idSolicitud,fechaRegistro,fechaResp,otorgadoX,aFavor,fechaDoc,docEncontrado,comentarios,pathVoucher,fechaPago,
    fechaEntrega,codAcceso,Estados_idEstado,Notarios_RUC,Solicitantes_DNI,Usuarios_DNI) values 
    (null,now(),date_add(now(),interval 7 day),_otorgadox,_afavor,null,null,null,null,null,null,_codAcc,'PROCBUSQ',
    _RUCNot,_DNISol,_DNIUser);
END$$

DROP PROCEDURE IF EXISTS `sp_listar_notarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_notarios` ()  BEGIN
        
    SELECT * FROM notarios;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_solicitantes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_solicitantes` ()  BEGIN
        
    SELECT * FROM solicitantes;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_solicitudes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_solicitudes` ()  BEGIN
        
    SELECT * FROM solicitudes;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_usuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_usuarios` ()  BEGIN
        
    SELECT * FROM usuarios;
END$$

DROP PROCEDURE IF EXISTS `ver_user_ac`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ver_user_ac` ()  BEGIN
        
    SELECT * FROM usuarios WHERE rol = 'AtencionCliente';
END$$

DROP PROCEDURE IF EXISTS `view_by_dni_sol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `view_by_dni_sol` (IN `_SolicitantesDNI` VARCHAR(8))  BEGIN
        
    SELECT * FROM solicitudes AS slctd INNER JOIN estados AS est ON slctd.Estados_idEstado = est.idEstado WHERE 
	slctd.Solicitantes_DNI = _SolicitantesDNI;
END$$

DROP PROCEDURE IF EXISTS `view_by_idSol_codAc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `view_by_idSol_codAc` (IN `_idSolicitud` INT(11))  BEGIN
        
    SELECT * FROM solicitudes AS slctd INNER JOIN estados AS est ON slctd.Estados_idEstado = est.idEstado WHERE 
	slctd.idSolicitud = _idSolicitud;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
  `idDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `tipoDocumento` varchar(45) DEFAULT NULL,
  `tipoInstrumento` varchar(45) DEFAULT NULL,
  `folios` varchar(45) DEFAULT NULL,
  `minutario` varchar(45) DEFAULT NULL,
  `minuta` varchar(45) DEFAULT NULL,
  `fojas` varchar(45) DEFAULT NULL,
  `indice` varchar(45) DEFAULT NULL,
  `Solicitudes_idSolicitud` int(11) NOT NULL,
  PRIMARY KEY (`idDocumento`),
  KEY `fk_Documentos_Solicitudes1_idx` (`Solicitudes_idSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `idEstado` varchar(8) NOT NULL,
  `TipoEstado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`idEstado`, `TipoEstado`) VALUES
('DOCEMIT', 'Documento emitido'),
('ESPPAGO', 'Esperando pago'),
('PROCBUSQ', 'En proceso de busqueda'),
('PROCCANC', 'Busqueda cancelada'),
('PROCEMIS', 'En proceso de emisión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `involucrados`
--

DROP TABLE IF EXISTS `involucrados`;
CREATE TABLE IF NOT EXISTS `involucrados` (
  `idInvolucrado` int(11) NOT NULL AUTO_INCREMENT,
  `tipoInvolucrado` varchar(45) DEFAULT NULL,
  `NombreCompleto` varchar(45) DEFAULT NULL,
  `Documentos_idDocumento` int(11) NOT NULL,
  PRIMARY KEY (`idInvolucrado`),
  KEY `fk_Involucrados_Documentos1_idx` (`Documentos_idDocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notarios`
--

DROP TABLE IF EXISTS `notarios`;
CREATE TABLE IF NOT EXISTS `notarios` (
  `RUC` varchar(10) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `ubicacion` text,
  PRIMARY KEY (`RUC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notarios`
--

INSERT INTO `notarios` (`RUC`, `nombres`, `apellidos`, `telefono`, `ubicacion`) VALUES
('1234567890', 'Ciro Alfredo', 'Galvez Herrera', '064217480', 'Calle Real 585 Huancayo'),
('1234567891', 'Mercedes María', 'Aleluya Vera', '064235660', 'Calle Real 622 Chilca'),
('1234567892', 'Ronald Romulo', 'Venero Bocangel', '970045750', 'Jr. Moquegua 191 Huancayo'),
('1234567893', 'Elsa Victoria', 'Canchaya Sánchez', '064224290', 'Jr. Loreto 356-358 Huancayo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitantes`
--

DROP TABLE IF EXISTS `solicitantes`;
CREATE TABLE IF NOT EXISTS `solicitantes` (
  `DNI` varchar(8) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidoPaterno` varchar(45) DEFAULT NULL,
  `apellidoMaterno` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitantes`
--

INSERT INTO `solicitantes` (`DNI`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `email`) VALUES
('41020031', 'ENRIQUE JAVIER', 'PEREZ', 'NAMOC', '987654321', 'migueltorres.mtv@gmail.com'),
('41778008', 'GONZALO FRANZ', 'LLANA', 'RARAZ', '987654321', 'migueltorres.mtv@gmail.com'),
('44297440', 'REYNALDO VALERIO', 'BARREDA', 'YABAR', '987654321', 'zenobiaacostag@gmail.com'),
('48114711', 'RAUL RODRIGO', 'ALVAREZ', 'ROJAS', '987654321', 'migueltorres.mtv@gmail.com'),
('70416701', 'Miguel', 'Torres', 'Vargas', '935378911', 'miguel@hotmail.com'),
('71838239', 'JOSEF STEVE', 'GOMEZ', 'GUTIERREZ', '987654321', 'migueltorres.mtv@gmail.com'),
('72285123', 'ALDAIR EDGAR', 'CHAVEZ', 'SEDANO', '987654321', '70416701@continental.edu.pe'),
('72422330', 'JEAN PIERRE PATRICK', 'LAURENTE', 'ZAMBRANO', '987654321', '70416701@continental.edu.pe'),
('80077159', 'TEOFILO', 'RODRIGUEZ', 'LAURA', '987654312', '70416701@continental.edu.pe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE IF NOT EXISTS `solicitudes` (
  `idSolicitud` int(11) NOT NULL AUTO_INCREMENT,
  `fechaRegistro` date DEFAULT NULL,
  `fechaResp` date DEFAULT NULL,
  `otorgadoX` varchar(45) DEFAULT NULL,
  `aFavor` varchar(45) DEFAULT NULL,
  `fechaDoc` date DEFAULT NULL,
  `docEncontrado` tinyint(4) DEFAULT NULL,
  `comentarios` text,
  `pathVoucher` text,
  `fechaPago` varchar(45) DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `codAcceso` varchar(6) DEFAULT NULL,
  `Estados_idEstado` varchar(8) NOT NULL,
  `Notarios_RUC` varchar(10) NOT NULL,
  `Solicitantes_DNI` varchar(8) NOT NULL,
  `Usuarios_DNI` varchar(8) NOT NULL,
  PRIMARY KEY (`idSolicitud`),
  KEY `fk_Solicitudes_Estados1_idx` (`Estados_idEstado`),
  KEY `fk_Solicitudes_Notarios1_idx` (`Notarios_RUC`),
  KEY `fk_Solicitudes_Solicitantes1_idx` (`Solicitantes_DNI`),
  KEY `fk_Solicitudes_Usuarios1_idx` (`Usuarios_DNI`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`idSolicitud`, `fechaRegistro`, `fechaResp`, `otorgadoX`, `aFavor`, `fechaDoc`, `docEncontrado`, `comentarios`, `pathVoucher`, `fechaPago`, `fechaEntrega`, `codAcceso`, `Estados_idEstado`, `Notarios_RUC`, `Solicitantes_DNI`, `Usuarios_DNI`) VALUES
(2, '2020-09-25', NULL, 'Pepito', 'Juanito', '1990-01-20', 0, 'No se pudo encontrar', NULL, NULL, NULL, NULL, 'PROCCANC', '1234567891', '70416701', '78965433'),
(3, '2020-09-25', NULL, 'Paco', 'Luis', NULL, 1, 'Se encontrÃ³ su documento, realice el pago por favor.', NULL, NULL, NULL, NULL, 'ESPPAGO', '1234567891', '70416701', '78965433'),
(21, '2020-10-02', NULL, 'Carlitos', 'Pedro', NULL, 1, 'm.kmlkjlkj', NULL, NULL, NULL, '7T65V1', 'ESPPAGO', '1234567892', '70416701', '78965433'),
(23, '2020-10-02', NULL, 'Pedro', 'Jose', NULL, 1, 'Se encontrÃ³ el documento, deposite el monto para proceder con la busqueda del documento.', './vouchers/foto_voucher.jpg', NULL, NULL, '7G75G9', 'ESPPAGO', '1234567893', '71838239', '78965433'),
(24, '2020-10-08', '2020-10-15', 'alva', 'roj', NULL, 1, NULL, NULL, NULL, NULL, '4A33R1', 'DOCEMIT', '1234567893', '48114711', '78965433'),
(27, '2020-10-09', '2020-10-16', 'Barreda', 'Yabar', NULL, 1, NULL, NULL, NULL, NULL, '4B96Y0', 'PROCEMIS', '1234567890', '44297440', '78965433'),
(28, '2020-10-09', '2020-10-16', 'Laurente', 'Zambrano', NULL, 1, NULL, NULL, NULL, NULL, '7L53Z0', 'PROCEMIS', '1234567892', '72422330', '78965433'),
(29, '2020-10-09', '2020-10-16', 'chavez', 'sedano', NULL, 1, NULL, NULL, NULL, NULL, '7C91S3', 'PROCEMIS', '1234567893', '72285123', '78965433'),
(30, '2020-10-09', '2020-10-16', 'Llana', 'Raraz', NULL, 0, NULL, NULL, NULL, NULL, '4L67R8', 'PROCCANC', '1234567891', '41778008', '78965433'),
(31, '2020-10-15', '2020-10-22', 'Namoc', 'Perez', NULL, 0, 'No se encontrÃ³ el documento que solicita.', NULL, NULL, NULL, '4P65N1', 'PROCCANC', '1234567892', '41020031', '78965433'),
(32, '2020-10-15', '2020-10-22', 'Rodriguez', 'Laura', NULL, 1, 'Documento encontrado en nuestra base de datos, pague el monto solicitado para seguir el proceso de emisiÃ³n del documento.', './vouchers/foto_voucher.jpg', NULL, NULL, '8R29L9', 'ESPPAGO', '1234567892', '80077159', '78965433');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `DNI` varchar(8) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidoPaterno` varchar(45) DEFAULT NULL,
  `apellidoMaterno` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `contrasenia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `email`, `direccion`, `rol`, `contrasenia`) VALUES
('78965433', 'Alonso', 'Mamani', 'Quispe', '978564321', 'alonso@gmail.com', 'Jr. Loreto 675 Huancayo', 'AtencionCliente', '1234');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `fk_Documentos_Solicitudes1` FOREIGN KEY (`Solicitudes_idSolicitud`) REFERENCES `solicitudes` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `involucrados`
--
ALTER TABLE `involucrados`
  ADD CONSTRAINT `fk_Involucrados_Documentos1` FOREIGN KEY (`Documentos_idDocumento`) REFERENCES `documentos` (`idDocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `fk_Solicitudes_Estados1` FOREIGN KEY (`Estados_idEstado`) REFERENCES `estados` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Solicitudes_Notarios1` FOREIGN KEY (`Notarios_RUC`) REFERENCES `notarios` (`RUC`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Solicitudes_Solicitantes1` FOREIGN KEY (`Solicitantes_DNI`) REFERENCES `solicitantes` (`DNI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Solicitudes_Usuarios1` FOREIGN KEY (`Usuarios_DNI`) REFERENCES `usuarios` (`DNI`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

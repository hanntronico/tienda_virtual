-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 05-08-2013 a las 10:47:15
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `bdtienda`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `categoria`
-- 

CREATE TABLE `categoria` (
  `cod_tipo` tinyint(11) NOT NULL auto_increment,
  `tipo` varchar(30) character set utf8 NOT NULL,
  `descripcion` text character set utf8,
  PRIMARY KEY  (`cod_tipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- 
-- Volcar la base de datos para la tabla `categoria`
-- 

INSERT INTO `categoria` VALUES (1, 'Aceites', NULL);
INSERT INTO `categoria` VALUES (2, 'Bebidas', NULL);
INSERT INTO `categoria` VALUES (3, 'Carnes', NULL);
INSERT INTO `categoria` VALUES (4, 'Condimentos', NULL);
INSERT INTO `categoria` VALUES (5, 'Conservas', NULL);
INSERT INTO `categoria` VALUES (6, 'Frutas', NULL);
INSERT INTO `categoria` VALUES (7, 'Embutidos', NULL);
INSERT INTO `categoria` VALUES (8, 'Licores', NULL);
INSERT INTO `categoria` VALUES (9, 'Art Limpieza', NULL);
INSERT INTO `categoria` VALUES (10, 'Aseo Personal', NULL);
INSERT INTO `categoria` VALUES (11, 'Arroz', NULL);
INSERT INTO `categoria` VALUES (12, 'Azúcar', NULL);
INSERT INTO `categoria` VALUES (13, 'Menestras', NULL);
INSERT INTO `categoria` VALUES (14, 'Tubérculos', NULL);
INSERT INTO `categoria` VALUES (15, 'Verduras', NULL);
INSERT INTO `categoria` VALUES (16, 'Fideos', NULL);
INSERT INTO `categoria` VALUES (17, 'Lácteos', NULL);
INSERT INTO `categoria` VALUES (18, 'Niños y bebes', NULL);
INSERT INTO `categoria` VALUES (19, 'Cafés y otros', NULL);
INSERT INTO `categoria` VALUES (20, 'Desayunos', NULL);
INSERT INTO `categoria` VALUES (21, 'Cigarros', NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `det_pedidos`
-- 

CREATE TABLE `det_pedidos` (
  `cod_pedido` tinyint(11) NOT NULL,
  `cod_producto` tinyint(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `dscto` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`cod_pedido`,`cod_producto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `det_pedidos`
-- 

INSERT INTO `det_pedidos` VALUES (47, 2, 12.50, 1, 12.50, 0.00);
INSERT INTO `det_pedidos` VALUES (36, 27, 20.00, 1, 20.00, 0.00);
INSERT INTO `det_pedidos` VALUES (36, 36, 1.30, 1, 1.30, 0.00);
INSERT INTO `det_pedidos` VALUES (36, 37, 19.00, 1, 19.00, 0.00);
INSERT INTO `det_pedidos` VALUES (47, 36, 1.30, 1, 1.30, 0.00);
INSERT INTO `det_pedidos` VALUES (50, 36, 1.30, 1, 1.30, 0.00);
INSERT INTO `det_pedidos` VALUES (50, 37, 19.00, 1, 19.00, 0.00);
INSERT INTO `det_pedidos` VALUES (50, 3, 23.90, 1, 23.90, 0.00);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `marca`
-- 

CREATE TABLE `marca` (
  `cod_marca` tinyint(11) NOT NULL auto_increment,
  `desc_marca` varchar(30) NOT NULL,
  PRIMARY KEY  (`cod_marca`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

-- 
-- Volcar la base de datos para la tabla `marca`
-- 

INSERT INTO `marca` VALUES (5, 'FORTE');
INSERT INTO `marca` VALUES (4, 'Teckno');
INSERT INTO `marca` VALUES (3, 'Silka');
INSERT INTO `marca` VALUES (2, 'Aceros Arequipa');
INSERT INTO `marca` VALUES (1, 'PACASMAYO');
INSERT INTO `marca` VALUES (87, 'GE');
INSERT INTO `marca` VALUES (86, 'OSRAM');
INSERT INTO `marca` VALUES (85, 'A GRANEL');
INSERT INTO `marca` VALUES (84, 'Quisqueya');
INSERT INTO `marca` VALUES (83, 'dasd');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `nivel`
-- 

CREATE TABLE `nivel` (
  `cod_nivel` tinyint(11) NOT NULL auto_increment,
  `nivel_descrip` varchar(20) NOT NULL,
  PRIMARY KEY  (`cod_nivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `nivel`
-- 

INSERT INTO `nivel` VALUES (1, 'Administrador');
INSERT INTO `nivel` VALUES (2, 'Cliente');
INSERT INTO `nivel` VALUES (3, 'oficina');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pedidos`
-- 

CREATE TABLE `pedidos` (
  `cod_pedido` tinyint(11) NOT NULL auto_increment,
  `cod_usuario` tinyint(11) NOT NULL,
  `fecpedido` datetime NOT NULL,
  `tipo_pago` char(2) character set utf8 NOT NULL,
  `fec_entrega` datetime NOT NULL,
  `hora_entrega` varchar(10) character set utf8 NOT NULL,
  `nom_entrega` varchar(50) character set utf8 NOT NULL,
  `direcc_entrega` varchar(80) character set utf8 NOT NULL,
  `comprob` char(2) character set utf8 NOT NULL,
  `rs_clie` varchar(100) character set utf8 NOT NULL,
  `ruc_clie` bigint(11) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY  (`cod_pedido`,`cod_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

-- 
-- Volcar la base de datos para la tabla `pedidos`
-- 

INSERT INTO `pedidos` VALUES (36, 12, '2013-08-03 00:00:00', 'E', '2013-08-03 00:00:00', '08:00', 'Lourdes Sofía Torres Gonzales', 'miguel grau 288', 'B', '', 0, 1);
INSERT INTO `pedidos` VALUES (47, 12, '2013-08-03 00:00:00', 'E', '2013-08-03 00:00:00', '08:00', 'Lourdes Sofía Torres Gonzales', 'miguel grau 288', 'F', 'MACBERRI SAC', 20487397092, 1);
INSERT INTO `pedidos` VALUES (50, 12, '2013-08-03 00:00:00', 'E', '2013-08-03 00:00:00', '08:00', 'Lourdes Sofía Torres Gonzales', 'miguel grau 288', 'B', '', 0, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `producto`
-- 

CREATE TABLE `producto` (
  `cod_producto` tinyint(11) NOT NULL auto_increment,
  `descripcion` text character set utf8 NOT NULL,
  `cod_subcat` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` text character set utf8 NOT NULL,
  `stock` int(11) NOT NULL,
  `cod_marca` tinyint(11) NOT NULL,
  `prom` int(1) NOT NULL,
  PRIMARY KEY  (`cod_producto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

-- 
-- Volcar la base de datos para la tabla `producto`
-- 

INSERT INTO `producto` VALUES (37, 'Avena Quaker', 1, 19.00, 'avena.png', 100, 84, 1);
INSERT INTO `producto` VALUES (36, 'NESCAFE', 1, 1.30, 'nescafe.png', 2, 2, 1);
INSERT INTO `producto` VALUES (27, 'Azúcar rubia CARTAVIO', 1, 20.00, 'azu_cartavio.png', 2, 3, 1);
INSERT INTO `producto` VALUES (25, 'MILO', 9, 2.00, 'milo.png', 70, 87, 1);
INSERT INTO `producto` VALUES (3, 'Aceite CAPRI', 9, 23.90, 'aceite.png', 100, 86, 0);
INSERT INTO `producto` VALUES (2, 'Atún Real', 9, 12.50, 'atun.png', 50, 86, 0);
INSERT INTO `producto` VALUES (1, 'Leche Gloria', 1, 64.80, 'leche.png', 2, 85, 0);
INSERT INTO `producto` VALUES (38, 'Fideos Molitalia', 2, 45.00, 'no_image.png', 120, 3, 0);
INSERT INTO `producto` VALUES (39, 'producto11', 3, 2.60, 'no_image.png', 4, 3, 0);
INSERT INTO `producto` VALUES (40, 'producto12', 2, 3.90, 'no_image.png', 2, 2, 0);
INSERT INTO `producto` VALUES (41, 'producto13', 4, 4.30, 'no_image.png', 0, 4, 0);
INSERT INTO `producto` VALUES (42, 'producto14', 4, 5.60, 'no_image.png', 4, 4, 0);
INSERT INTO `producto` VALUES (43, 'producto15', 3, 6.90, 'no_image.png', 2, 3, 0);
INSERT INTO `producto` VALUES (44, 'producto16', 2, 7.30, 'no_image.png', 1, 3, 0);
INSERT INTO `producto` VALUES (45, 'producto17', 2, 8.60, 'no_image.png', 1, 2, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `subcategorias`
-- 

CREATE TABLE `subcategorias` (
  `cod_subcat` int(11) NOT NULL auto_increment,
  `subcat` varchar(50) character set utf8 NOT NULL,
  `desc_subcat` varchar(50) character set utf8 NOT NULL,
  `img_subcat` text character set utf8 NOT NULL,
  `cod_tipo` tinyint(11) NOT NULL,
  PRIMARY KEY  (`cod_subcat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=47 ;

-- 
-- Volcar la base de datos para la tabla `subcategorias`
-- 

INSERT INTO `subcategorias` VALUES (1, 'Maíz', 'esta es la subcategoria 1', 'no_image.png', 1);
INSERT INTO `subcategorias` VALUES (2, 'Vegetal', 'esta es la subcategoria 2', 'no_image.png', 1);
INSERT INTO `subcategorias` VALUES (3, 'Gaseosas', 'esta es la subcategoria 3', 'no_image.png', 2);
INSERT INTO `subcategorias` VALUES (4, 'Hidratantes', 'esta es la subcategoria 4', 'no_image.png', 2);
INSERT INTO `subcategorias` VALUES (5, 'Agua', 'esta es la subcategoria 5', 'no_image.png', 2);
INSERT INTO `subcategorias` VALUES (6, 'Res', 'esta es la subcategoria 6', 'no_image.png', 3);
INSERT INTO `subcategorias` VALUES (7, 'Pollo', 'esta es la subcategoria 7', 'no_image.png', 3);
INSERT INTO `subcategorias` VALUES (8, 'Cerdo', 'esta es la subcategoria 8', 'no_image.png', 3);
INSERT INTO `subcategorias` VALUES (9, 'Pescado', 'esta es la subcategoria 9', 'no_image.png', 3);
INSERT INTO `subcategorias` VALUES (10, 'Sal de mesa', 'esta es la subcategoria 10', 'no_image.png', 4);
INSERT INTO `subcategorias` VALUES (11, 'Pimienta', 'esta es la subcategoria 11', 'no_image.png', 4);
INSERT INTO `subcategorias` VALUES (12, 'Comino', 'esta es la subcategoria 12', 'no_image.png', 4);
INSERT INTO `subcategorias` VALUES (13, 'Caldos', 'esta es la subcategoria 13', 'no_image.png', 4);
INSERT INTO `subcategorias` VALUES (14, 'Vinagre', 'esta es la subcategoria 14', 'no_image.png', 4);
INSERT INTO `subcategorias` VALUES (15, 'Sillao', 'esta es la subcategoria 15', 'no_image.png', 4);
INSERT INTO `subcategorias` VALUES (16, 'Pescado', 'esta es la subcategoria 16', 'no_image.png', 5);
INSERT INTO `subcategorias` VALUES (17, 'Durazno', 'subcategoría de los duraznos en conserva', 'no_image.png', 5);
INSERT INTO `subcategorias` VALUES (18, 'Naranja', '', 'no_image.png', 6);
INSERT INTO `subcategorias` VALUES (19, 'Tomate', '', 'no_image.png', 6);
INSERT INTO `subcategorias` VALUES (20, 'Durazno', '', 'no_image.png', 6);
INSERT INTO `subcategorias` VALUES (21, 'Limón', '', 'no_image.png', 6);
INSERT INTO `subcategorias` VALUES (22, 'Piña', '', 'no_image.png', 6);
INSERT INTO `subcategorias` VALUES (23, 'Papaya', '', 'no_image.png', 6);
INSERT INTO `subcategorias` VALUES (24, 'Granadilla', '', 'no_image.png', 6);
INSERT INTO `subcategorias` VALUES (25, 'Melón', '', 'no_image.png', 6);
INSERT INTO `subcategorias` VALUES (26, 'Jamón', '', 'no_image.png', 7);
INSERT INTO `subcategorias` VALUES (27, 'Hotdog', '', 'no_image.png', 7);
INSERT INTO `subcategorias` VALUES (28, 'Salchicha', '', 'no_image.png', 7);
INSERT INTO `subcategorias` VALUES (29, 'Jamonada', '', 'no_image.png', 7);
INSERT INTO `subcategorias` VALUES (30, 'Cervezas', '', 'no_image.png', 8);
INSERT INTO `subcategorias` VALUES (31, 'Wiskys', '', 'no_image.png', 8);
INSERT INTO `subcategorias` VALUES (32, 'Piscos', '', 'no_image.png', 8);
INSERT INTO `subcategorias` VALUES (33, 'Vinos', '', 'no_image.png', 8);
INSERT INTO `subcategorias` VALUES (34, 'Desinfectantes', '', 'no_image.png', 9);
INSERT INTO `subcategorias` VALUES (35, 'Detergentes', '', 'no_image.png', 9);
INSERT INTO `subcategorias` VALUES (36, 'Lejía', '', 'no_image.png', 9);
INSERT INTO `subcategorias` VALUES (37, 'Jabones', '', 'no_image.png', 10);
INSERT INTO `subcategorias` VALUES (38, 'Desodorante', '', 'no_image.png', 10);
INSERT INTO `subcategorias` VALUES (39, 'Papel Higiénico', '', 'no_image.png', 10);
INSERT INTO `subcategorias` VALUES (40, 'Toallas higiénicas', '', 'no_image.png', 10);
INSERT INTO `subcategorias` VALUES (41, 'Shampu', '', 'no_image.png', 10);
INSERT INTO `subcategorias` VALUES (42, 'Pañal - Adultos', '', 'no_image.png', 10);
INSERT INTO `subcategorias` VALUES (43, 'Costeño', '', 'no_image.png', 11);
INSERT INTO `subcategorias` VALUES (44, 'V. del Norte', '', 'no_image.png', 11);
INSERT INTO `subcategorias` VALUES (45, 'Paisana', '', 'no_image.png', 11);
INSERT INTO `subcategorias` VALUES (46, 'Pomalca', '', 'no_image.png', 12);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuario`
-- 

CREATE TABLE `usuario` (
  `cod_usuario` tinyint(11) NOT NULL auto_increment,
  `login` varchar(32) character set utf8 NOT NULL,
  `clave` varchar(32) character set utf8 NOT NULL,
  `nombre` text character set utf8 NOT NULL,
  `apellidos` text character set utf8 NOT NULL,
  `dni` char(8) character set utf8 NOT NULL,
  `direccion` text character set utf8,
  `telefono` varchar(15) character set utf8 default NULL,
  `correo` text character set utf8,
  `cod_nivel` tinyint(11) NOT NULL,
  PRIMARY KEY  (`cod_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- 
-- Volcar la base de datos para la tabla `usuario`
-- 

INSERT INTO `usuario` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'Administrador', '12345678', '', '', 'admin@hotmail.com', 1);
INSERT INTO `usuario` VALUES (18, '', '09ca5156bffa193403a7407d733f549c', 'Robert', 'Malca Lara', '48596978', '', '98749825125', 'robertm_l@gmail.com', 2);
INSERT INTO `usuario` VALUES (12, 'lulu', '81dc9bdb52d04dc20036dbd8313ed055', 'Lourdes Sofía', 'Torres Gonzales', '41918468', 'miguel grau 288', '266278', 'lourdes@hotmail.com', 2);
INSERT INTO `usuario` VALUES (13, 'carlos', 'e10adc3949ba59abbe56e057f20f883e', 'carlos', 'gil', '45617894', '', '', 'carlos@hotmail.com', 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuario_temporal`
-- 

CREATE TABLE `usuario_temporal` (
  `cod_usuario` tinyint(11) NOT NULL auto_increment,
  `login` varchar(32) character set utf8 NOT NULL,
  `clave` varchar(32) character set utf8 NOT NULL,
  `nombre` text character set utf8 NOT NULL,
  `apellidos` text character set utf8 NOT NULL,
  `dni` char(8) character set utf8 NOT NULL,
  `direccion` text character set utf8,
  `telefono` varchar(15) character set utf8 default NULL,
  `correo` text character set utf8,
  `cod_nivel` tinyint(11) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY  (`cod_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- 
-- Volcar la base de datos para la tabla `usuario_temporal`
-- 

INSERT INTO `usuario_temporal` VALUES (3, 'a', 'a', 'a', 'a', '1', 'e', '', '', 2, 0);
INSERT INTO `usuario_temporal` VALUES (22, '', '', 'Carlos Enrique', 'Clavijo Torres', '44113366', NULL, '96385241', 'cclavijot@gmail.com', 2, 0);
INSERT INTO `usuario_temporal` VALUES (24, '', 'yd0YDjh', 'Robert', 'Malca Lara', '48596978', NULL, '98749825125', 'robertm_l@gmail.com', 2, 0);

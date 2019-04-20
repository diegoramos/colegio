-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-03-2019 a las 22:55:02
-- Versión del servidor: 10.1.37-MariaDB-0+deb9u1
-- Versión de PHP: 7.2.16-1+0~20190307202415.17+stretch~1.gbpa7be82

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sysbitzua`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_config`
--

CREATE TABLE `app_config` (
  `name_key` varchar(250) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_files`
--

CREATE TABLE `app_files` (
  `file_id` int(10) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_data` longblob NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expires` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `company` text COLLATE utf8_unicode_ci,
  `website` text COLLATE utf8_unicode_ci,
  `company_logo` int(10) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci,
  `fax` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `cc_email` text COLLATE utf8_unicode_ci,
  `bcc_email` text COLLATE utf8_unicode_ci,
  `color` text COLLATE utf8_unicode_ci,
  `return_policy` text COLLATE utf8_unicode_ci,
  `receive_stock_alert` text COLLATE utf8_unicode_ci,
  `stock_alert_email` text COLLATE utf8_unicode_ci,
  `timezone` text COLLATE utf8_unicode_ci,
  `mailchimp_api_key` text COLLATE utf8_unicode_ci,
  `enable_credit_card_processing` text COLLATE utf8_unicode_ci,
  `credit_card_processor` text COLLATE utf8_unicode_ci,
  `hosted_checkout_merchant_id` text COLLATE utf8_unicode_ci,
  `hosted_checkout_merchant_password` text COLLATE utf8_unicode_ci,
  `emv_merchant_id` text COLLATE utf8_unicode_ci,
  `net_e_pay_server` text COLLATE utf8_unicode_ci,
  `listener_port` text COLLATE utf8_unicode_ci,
  `com_port` text COLLATE utf8_unicode_ci,
  `stripe_public` text COLLATE utf8_unicode_ci,
  `stripe_private` text COLLATE utf8_unicode_ci,
  `stripe_currency_code` text COLLATE utf8_unicode_ci,
  `braintree_merchant_id` text COLLATE utf8_unicode_ci,
  `braintree_public_key` text COLLATE utf8_unicode_ci,
  `braintree_private_key` text COLLATE utf8_unicode_ci,
  `default_tax_1_rate` text COLLATE utf8_unicode_ci,
  `default_tax_1_name` text COLLATE utf8_unicode_ci,
  `default_tax_2_rate` text COLLATE utf8_unicode_ci,
  `default_tax_2_name` text COLLATE utf8_unicode_ci,
  `default_tax_2_cumulative` text COLLATE utf8_unicode_ci,
  `default_tax_3_rate` text COLLATE utf8_unicode_ci,
  `default_tax_3_name` text COLLATE utf8_unicode_ci,
  `default_tax_4_rate` text COLLATE utf8_unicode_ci,
  `default_tax_4_name` text COLLATE utf8_unicode_ci,
  `default_tax_5_rate` text COLLATE utf8_unicode_ci,
  `default_tax_5_name` text COLLATE utf8_unicode_ci,
  `deleted` int(1) DEFAULT '0',
  `secure_device_override_emv` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `secure_device_override_non_emv` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tax_class_id` int(10) DEFAULT NULL,
  `ebt_integrated` int(1) NOT NULL DEFAULT '0',
  `integrated_gift_cards` int(1) NOT NULL DEFAULT '0',
  `square_currency_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USD',
  `square_location_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `square_currency_multiplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`location_id`, `name`, `company`, `website`, `company_logo`, `address`, `phone`, `fax`, `email`, `cc_email`, `bcc_email`, `color`, `return_policy`, `receive_stock_alert`, `stock_alert_email`, `timezone`, `mailchimp_api_key`, `enable_credit_card_processing`, `credit_card_processor`, `hosted_checkout_merchant_id`, `hosted_checkout_merchant_password`, `emv_merchant_id`, `net_e_pay_server`, `listener_port`, `com_port`, `stripe_public`, `stripe_private`, `stripe_currency_code`, `braintree_merchant_id`, `braintree_public_key`, `braintree_private_key`, `default_tax_1_rate`, `default_tax_1_name`, `default_tax_2_rate`, `default_tax_2_name`, `default_tax_2_cumulative`, `default_tax_3_rate`, `default_tax_3_name`, `default_tax_4_rate`, `default_tax_4_name`, `default_tax_5_rate`, `default_tax_5_name`, `deleted`, `secure_device_override_emv`, `secure_device_override_non_emv`, `tax_class_id`, `ebt_integrated`, `integrated_gift_cards`, `square_currency_code`, `square_location_id`, `square_currency_multiplier`) VALUES
(1, 'tienda demo', 'TIENDA DEMO', 'https://www.bitzua.com/', 4, 'Jr. La molina 125 Urb. Villa Universitaria-Los Olivos', '983439931 -  983439767', '', 'ventas@jigeneral.com', '', '', '#2196f3', 'Política de devolución', '0', '', 'America/Lima', '', '0', 'mercury', '', '', '', '', '', '', '', '', 'usd', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', 0, '', '', NULL, 1, 0, 'USD', '', '100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `module_id` varchar(100) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `sort` int(11) NOT NULL,
  `desc_lang_key` varchar(250) NOT NULL,
  `name_lang_key` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`module_id`, `icon`, `sort`, `desc_lang_key`, `name_lang_key`) VALUES
('usuarios', 'fa fa-users', 50, 'module_usuarios_desc', 'module_usuarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules_actions`
--

CREATE TABLE `modules_actions` (
  `action_id` varchar(100) NOT NULL,
  `module_id` varchar(100) NOT NULL,
  `action_name_key` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modules_actions`
--

INSERT INTO `modules_actions` (`action_id`, `module_id`, `action_name_key`, `sort`) VALUES
('add_update', 'usuarios', 'module_action_add_update', 130),
('delete', 'usuarios', 'module_action_delete', 135);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `module_id` varchar(100) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`module_id`, `id_persona`) VALUES
('usuarios', 1),
('usuarios', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions_actions`
--

CREATE TABLE `permissions_actions` (
  `module_id` varchar(100) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `action_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permissions_actions`
--

INSERT INTO `permissions_actions` (`module_id`, `id_persona`, `action_id`) VALUES
('usuarios', 1, 'add_update'),
('usuarios', 1, 'delete'),
('usuarios', 2, 'add_update'),
('usuarios', 2, 'delete');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `appaterno` varchar(100) NOT NULL,
  `apmaterno` varchar(100) NOT NULL,
  `nombre_completo` varchar(150) NOT NULL,
  `sexo` char(2) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombres`, `appaterno`, `apmaterno`, `nombre_completo`, `sexo`, `dni`, `email`, `telefono`, `create_date`, `last_modified`, `deleted`) VALUES
(1, 'Atahualpa', 'Inca', 'Quispe', 'Atahualpa Inca Quispe', 'M', '67543223', 'athahualpa@gmail.com', '991314843', '2018-08-26 01:19:02', '2018-11-02 00:00:00', 0),
(2, 'Juan', 'Soto', 'Mendez', 'Juan Soto Mendez', 'F', '8888888', 'face@gmail.com', '9483874343', '2019-03-27 22:27:17', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash_version` int(1) NOT NULL DEFAULT '2',
  `estado` int(11) NOT NULL DEFAULT '1',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_persona`, `usuario`, `password`, `hash_version`, `estado`, `deleted`) VALUES
(1, 1, 'admin', '$2y$10$W2BMNM3dWw37cKLjzJQqS.Jx.iEvXMNGwlxTMLG8WODG78jWxlW0W', 2, 1, 0),
(2, 2, 'juan', '$2y$10$mi80dJkUqDToSkonSj1MrO542pACWdcJA/oENAtxbiNmRx1TB.8Lu', 2, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_locations`
--

CREATE TABLE `usuarios_locations` (
  `id_usuario` int(10) NOT NULL,
  `location_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios_locations`
--

INSERT INTO `usuarios_locations` (`id_usuario`, `location_id`) VALUES
(1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `app_files`
--
ALTER TABLE `app_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indices de la tabla `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `deleted` (`deleted`),
  ADD KEY `locations_ibfk_1` (`company_logo`),
  ADD KEY `name` (`name`(255)),
  ADD KEY `address` (`address`(255)),
  ADD KEY `phone` (`phone`(255)),
  ADD KEY `email` (`email`(255));

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indices de la tabla `modules_actions`
--
ALTER TABLE `modules_actions`
  ADD PRIMARY KEY (`action_id`,`module_id`),
  ADD KEY `fk_modules_actions` (`module_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`module_id`,`id_persona`),
  ADD KEY `fk_persona_actions` (`id_persona`),
  ADD KEY `fk_persona_permissions` (`id_persona`),
  ADD KEY `fk_persona_id_permissions` (`module_id`);

--
-- Indices de la tabla `permissions_actions`
--
ALTER TABLE `permissions_actions`
  ADD PRIMARY KEY (`module_id`,`id_persona`,`action_id`),
  ADD KEY `fk_module_permissions_actions` (`module_id`),
  ADD KEY `fk_personas_permissions_actions` (`id_persona`),
  ADD KEY `fk_action_permissions_actions` (`action_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_persona` (`id_persona`);

--
-- Indices de la tabla `usuarios_locations`
--
ALTER TABLE `usuarios_locations`
  ADD PRIMARY KEY (`id_usuario`,`location_id`),
  ADD KEY `usuarios_locations_ibfk_2` (`location_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `app_files`
--
ALTER TABLE `app_files`
  MODIFY `file_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modules_actions`
--
ALTER TABLE `modules_actions`
  ADD CONSTRAINT `fk_modules_actions` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `fk_module_id_permissions` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_actions` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_permissions` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permissions_actions`
--
ALTER TABLE `permissions_actions`
  ADD CONSTRAINT `fk_action_permissions_actions` FOREIGN KEY (`action_id`) REFERENCES `modules_actions` (`action_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_module_permissions_actions` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_personas_permissions_actions` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_locations`
--
ALTER TABLE `usuarios_locations`
  ADD CONSTRAINT `usuarios_locations_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuarios_locations_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

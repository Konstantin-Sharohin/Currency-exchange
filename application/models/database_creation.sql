CREATE TABLE `currencies` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency_type` varchar(10) NOT NULL,
  `buy` DECIMAL(10,4) NOT NULL,
  `sale` DECIMAL(10,4) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `current_date` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
);
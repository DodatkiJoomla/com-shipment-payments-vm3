CREATE TABLE IF NOT EXISTS `#__vm3_shipmentmethod_paymentmethods_xref`
(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `virtuemart_shipmentmethod_id` MEDIUMINT UNSIGNED NOT NULL,
  `virtuemart_paymentmethod_id` MEDIUMINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
);

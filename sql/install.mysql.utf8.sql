CREATE TABLE IF NOT EXISTS `#__vm3_shipmentmethod_paymentmethods_xref`
(
  `virtuemart_shipmentmethod_id` MEDIUMINT(8) UNSIGNED NOT NULL,
  `virtuemart_paymentmethod_id` MEDIUMINT(8) UNSIGNED NOT NULL,
  `published` TINYINT(1) UNSIGNED NOT NULL DEFAULT '1'
);
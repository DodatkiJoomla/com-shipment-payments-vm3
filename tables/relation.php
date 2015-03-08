<?php
// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.database.table');

class Shipment_Payments_Vm3TableRelation extends JTable
{
	function __construct(&$db) 
	{
		parent::__construct('#__vm3_shipmentmethod_paymentmethods_xref', 'virtuemart_shipmentmethod_id', $db);
	}
}

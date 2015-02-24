<?php

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class ShipmentPaymentsVm3Controller extends JController
{
	function display($cachable = false) 
	{
		// Set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'ShipmentPaymentsVm3'));
		
		parent::display($cachable);
		
		// Add submenu
		ShipmentPaymentsVm3Helper::addSubmenu('messages');
	}
}

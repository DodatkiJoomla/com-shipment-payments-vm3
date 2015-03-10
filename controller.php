<?php

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class Shipment_Payments_Vm3Controller extends JController
{
	function display($cachable = false,$urlparams = false)
	{
		// Set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'Relations'));
		
		parent::display($cachable);
		
		// Add submenu
        Shipment_Payments_Vm3_Helper::addSubmenu('messages');
	}
}

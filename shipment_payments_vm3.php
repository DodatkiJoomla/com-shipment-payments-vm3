<?php

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('Shipment_Payments_Vm3');

// Require helper file
JLoader::register('Shipment_Payments_Vm3_Helper', dirname(__FILE__) . DS . 'helpers' . DS . 'shipment_payments_vm3.php');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();

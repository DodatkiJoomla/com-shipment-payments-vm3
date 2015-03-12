<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

class Shipment_Payments_Vm3_Helper
{
    public static function addSubmenu($submenu)
    {
        $document = JFactory::getDocument();

        if(!JFactory::getApplication()->get('jquery')){
            JFactory::getApplication()->set('jquery',true);

            $document->addScript( "components/com_shipment_payments_vm3/assets/js/jquery-2.1.1.min.js");
        }

        $document->addScript( "components/com_shipment_payments_vm3/assets/css/style.css");


    }
}

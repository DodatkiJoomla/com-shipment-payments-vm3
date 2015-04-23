<?php
// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

class Shipment_Payments_Vm3ModelMain extends JModelLegacy
{
    public function Lang()
    {
        $lang = JFactory::getLanguage();
        $lang = $lang->getLocale();
        $dbLang = substr(strtolower($lang[2]), 0, 5);
        return $dbLang;
    }
}
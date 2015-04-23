<?php
// No direct access to this file
defined('_JEXEC') or die;
include('main.php');

jimport('joomla.application.component.modeladmin');

class Shipment_Payments_Vm3ModelRelation extends Shipment_Payments_Vm3ModelMain
{
    public function getShipments()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);

        // Wybieranie z bazy wszystkich ID i nazw opublikowanych metod wysyłki.
        $query->select($db->quoteName(array('tab.virtuemart_shipmentmethod_id', 'tabLang.shipment_name')))
            ->from($db->quoteName('#__virtuemart_shipmentmethods', 'tab'))
            ->join('RIGHT', $db->quoteName('#__virtuemart_shipmentmethods_' . $this->Lang(),
                    'tabLang') . ' ON (' . $db->quoteName('tab.virtuemart_shipmentmethod_id') . ' = ' . $db->quoteName('tabLang.virtuemart_shipmentmethod_id') . ')');
        $db->setQuery($query);

        return $db->loadObjectList();
    }

    public function getPayments()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);

        // Wybieranie z bazy wszystkich ID i nazw opublikowanych metod płatności.
        $query->select($db->quoteName(array('tab.virtuemart_paymentmethod_id', 'tabLang.payment_name')))
            ->from($db->quoteName('#__virtuemart_paymentmethods', 'tab'))
            ->join('RIGHT', $db->quoteName('#__virtuemart_paymentmethods_' . $this->Lang(),
                    'tabLang') . ' ON (' . $db->quoteName('tab.virtuemart_paymentmethod_id') . ' = ' . $db->quoteName('tabLang.virtuemart_paymentmethod_id') . ')');
        $db->setQuery($query);

        return $db->loadObjectList();
    }

    public function saveRelation($virtuemartShipmentmethodId, array $virtuemartPaymentmethodsId)
    {
        $db =& JFactory::getDBO();

        $query = $db->getQuery(true);
        $query->delete('#__vm3_shipmentmethod_paymentmethods_xref')
            ->where($db->quoteName('virtuemart_shipmentmethod_id') . ' = ' . $virtuemartShipmentmethodId
            );
        $db->setQuery($query);
        if ($db->execute() == false) {
            throw new Exception('Database error on delete.');
        }

        foreach ($virtuemartPaymentmethodsId as $virtuemartPaymentmethodId) {
            $query = $db->getQuery(true);
            $query
                ->insert('#__vm3_shipmentmethod_paymentmethods_xref')
                ->columns(array('virtuemart_shipmentmethod_id', 'virtuemart_paymentmethod_id'))
                ->values($virtuemartShipmentmethodId . "," . $virtuemartPaymentmethodId);
            $db->setQuery($query);
            if ($db->execute() == false) {
                throw new Exception('Database error on insert ['.$virtuemartShipmentmethodId.','.$virtuemartPaymentmethodId.'].');
            }
        }

        return true;
    }

    public function getData()
    {
        $db =& JFactory::getDBO();

        $query = $db->getQuery(true);
        $query->select($db->quoteName(array('tab.virtuemart_paymentmethod_id', 'tabLang.payment_name')))
            ->from($db->quoteName('#__virtuemart_paymentmethods', 'tab'))
            ->join('RIGHT', $db->quoteName('#__virtuemart_paymentmethods_' . $this->Lang(),
                    'tabLang') . ' ON (' . $db->quoteName('tab.virtuemart_paymentmethod_id') . ' = ' . $db->quoteName('tabLang.virtuemart_paymentmethod_id') . ')')
            ->where($db->quoteName('tab.published') . ' = 1');
        $db->setQuery($query);

        return $db->loadObjectList();
    }
}

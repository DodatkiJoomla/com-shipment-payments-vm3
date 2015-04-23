<?php
// No direct access to this file
defined('_JEXEC') or die;
include('main.php');

jimport('joomla.application.component.modeladmin');

class Shipment_Payments_Vm3ModelRelations extends Shipment_Payments_Vm3ModelMain
{
    public function getData()
    {
        $db = JFactory::getDBO();

        $query = $db->getQuery(true);
        $query->
        select($db->quoteName(
                array(
                    'xref.virtuemart_paymentmethod_id',
                    'payLang.payment_name',
                    'xref.virtuemart_shipmentmethod_id',
                    'shipLang.shipment_name',
                    'xref.published'
                )))
            ->from($db->quoteName('#__vm3_shipmentmethod_paymentmethods_xref', 'xref'))
            ->join('RIGHT', $db->quoteName('#__virtuemart_paymentmethods_' . $this->Lang(),
                    'payLang') . ' ON (' . $db->quoteName('xref.virtuemart_paymentmethod_id') . ' = ' . $db->quoteName('payLang.virtuemart_paymentmethod_id') . ')')
            ->join('INNER', $db->quoteName('#__virtuemart_shipmentmethods_' . $this->Lang(),
                    'shipLang') . ' ON (' . $db->quoteName('xref.virtuemart_shipmentmethod_id') . ' = ' . $db->quoteName('shipLang.virtuemart_shipmentmethod_id') . ')');
        $db->setQuery($query);

        $results = $db->loadObjectList();
        return $this->Data($results);
    }

    public function Data($tab)
    {
        $temp = array();

        foreach ($tab as $key) {
            $temp[$key->virtuemart_shipmentmethod_id] = array(
                "virtuemart_shipmentmethod_id" => $key->virtuemart_shipmentmethod_id,
                "shipment_name" => $key->shipment_name,
                "published" => $key->published,
                "payments" => array()
            );
            foreach ($tab as $row) {
                if ($temp[$key->virtuemart_shipmentmethod_id]['virtuemart_shipmentmethod_id'] == $row->virtuemart_shipmentmethod_id) {
                    $temp[$key->virtuemart_shipmentmethod_id]['payments'][$row->virtuemart_paymentmethod_id] = array(
                        "payment_id" => $row->virtuemart_paymentmethod_id,
                        "payment_name" => $row->payment_name
                    );
                }

            };
        };

        return array_values($temp);
    }
}

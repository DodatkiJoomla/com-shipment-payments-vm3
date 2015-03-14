<?php
// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

class Shipment_Payments_Vm3ModelRelation extends JModelLegacy
{
	public function getForm($data = array(), $loadData = true)
	{
        return true;
	}

    public function getShipments()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);

        // Wybieranie z bazy wszystkich ID i nazw opublikowanych metod wysyłki.
        $query->select($db->quoteName(array('tab.virtuemart_shipmentmethod_id', 'tabLang.shipment_name')))
            ->from($db->quoteName('#__virtuemart_shipmentmethods', 'tab'))
            ->join('RIGHT', $db->quoteName('#__virtuemart_shipmentmethods_'. $this->Lang(), 'tabLang') . ' ON (' . $db->quoteName('tab.virtuemart_shipmentmethod_id') . ' = ' . $db->quoteName('tabLang.virtuemart_shipmentmethod_id') . ')');
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
            ->join('RIGHT', $db->quoteName('#__virtuemart_paymentmethods_'. $this->Lang(), 'tabLang') . ' ON (' . $db->quoteName('tab.virtuemart_paymentmethod_id') . ' = ' . $db->quoteName('tabLang.virtuemart_paymentmethod_id') . ')');
        $db->setQuery($query);

        return $db->loadObjectList();
    }

    public function saveRelation($virtuemartShipmentmethodId, array $virtuemartPaymentmethodsId)
    {
        $db =& JFactory::getDBO();
//        if(!isset($virtuemartShipmentmethodId)) {
//
//        }
        $query = $db->getQuery(true);
        $query->delete('#__vm3_shipmentmethod_paymentmethods_xref')
            ->where($db->quoteName('virtuemart_shipmentmethod_id').' = '. $virtuemartShipmentmethodId
        );
        $db->setQuery($query);
        if ($db->execute()==false) {
            throw new Exception('Database error on delete.');
        }

        foreach($virtuemartPaymentmethodsId as $virtuemartPaymentmethodId) {
            $query = $db->getQuery(true);
            $query
                ->insert('#__vm3_shipmentmethod_paymentmethods_xref')
                ->columns(array('virtuemart_shipmentmethod_id', 'virtuemart_paymentmethod_id'))
                ->values($virtuemartShipmentmethodId.",".$virtuemartPaymentmethodId);
            $db->setQuery($query);
            if ($db->execute()==false) {
                throw new Exception('Database error on insert.');
            }
        }

        return true;
    }

    /*
  * Obsługa języka.
  */
    public function Lang()
    {
        $lang = JFactory::getLanguage();
        $lang = $lang->getLocale();
        $jezyk = substr(strtolower($lang[2]), 0, 5);
        return $jezyk;
    }

    public function getData() {
//        $sql_clear = "SELECT `xref`.`id`, `xref`.`virtuemart_paymentmethod_id`,
//                        `payLang`.`payment_name`,
//                        `xref`.`virtuemart_shipmentmethod_id`,
//                        `shipLang`.`shipment_name`
//                      FROM `j25vm_vm3_shipmentmethod_paymentmethods_xref` AS `xref`
//                      INNER JOIN `j25vm_virtuemart_paymentmethods_pl_pl` AS `payLang`
//                      ON `xref`.`virtuemart_paymentmethod_id` = `payLang`.`virtuemart_paymentmethod_id`
//                      INNER JOIN `j25vm_virtuemart_shipmentmethods_pl_pl` AS `shipLang`
//                      ON `xref`.`virtuemart_shipmentmethod_id` = `shipLang`.`virtuemart_shipmentmethod_id`";

        $db =& JFactory::getDBO();

        $query = $db->getQuery(true);
        //
//        $query->select($db->quoteName(array('xref.id', 'xref.virtuemart_paymentmethod_id',
//                        'payLang.payment_name',
//                        'xref.virtuemart_shipmentmethod_id',
//                        'shipLang.shipment_name'
//        )))
//            ->from($db->quoteName('#__vm3_shipmentmethod_paymentmethods_xref', 'xref'))
//            ->join('RIGHT', $db->quoteName('#__virtuemart_paymentmethods_'. $this->Lang(), 'payLang') . ' ON (' . $db->quoteName('xref.virtuemart_paymentmethod_id') . ' = ' . $db->quoteName('payLang.virtuemart_paymentmethod_id') . ')')
//            ->join('RIGHT', $db->quoteName('#__virtuemart_shipmentmethods_'. $this->Lang(), 'shipLang') . ' ON (' . $db->quoteName('xref.virtuemart_shipmentmethod_id') . ' = ' . $db->quoteName('shipLang.virtuemart_shipmentmethod_id') . ')');

        $query->select($db->quoteName(array('tab.virtuemart_paymentmethod_id', 'tabLang.payment_name')))
            ->from($db->quoteName('#__virtuemart_paymentmethods', 'tab'))
            ->join('RIGHT', $db->quoteName('#__virtuemart_paymentmethods_'. $this->Lang(), 'tabLang') . ' ON (' . $db->quoteName('tab.virtuemart_paymentmethod_id') . ' = ' . $db->quoteName('tabLang.virtuemart_paymentmethod_id') . ')')
            ->where($db->quoteName('tab.published') . ' = 1');
        $db->setQuery($query);

        print_r($db->loadObjectList());
        die;
        return $db->loadObjectList();
    }

    /**
     * @param string $name
     * @param string $prefix
     * @param array $options
     *
     * @return Shipment_Payments_Vm3TableRelation
     */
	public function getTable($name = '', $prefix = 'Shipment_Payments_Vm3Table', $options = array())
	{
		return parent::getTable($name, $prefix, $options);
	}
}

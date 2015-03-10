<?php
// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

class Shipment_Payments_Vm3ModelRelation extends JModelAdmin
{
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.

		$form = $this->loadForm('com_shipment_payments_vm3.shipment_payments_vm3', 'relation', array('control' => 'jform', 'load_data' => $loadData));

        return $form;
	}


    public function getDelivery()
    {
        //        $q1 = "SELECT virtuemart_shipmentmethod_id AS id, shipment_name FROM #__virtuemart_shipmentmethods JOIN #__virtuemart_shipmentmethods_" . $this->jezyk() . " using(virtuemart_shipmentmethod_id)";
        //        $join_sql = "SHOW TABLE STATUS WHERE Name LIKE '%_virtuemart_shipmentmethods_%' AND Name NOT LIKE '%_virtuemart_shipmentmethods_" . $this->jezyk() . "%'";
        //        $db->setQuery($join_sql);
        //        $joiny = $db->loadObjectList();
        //        foreach ($joiny as $j) {
        //            $q1 .= ' UNION SELECT virtuemart_shipmentmethod_id AS id, shipment_name FROM #__virtuemart_shipmentmethods JOIN ' . $j->Name . ' using(virtuemart_shipmentmethod_id)   ';
        //        }
        //
        //
        //        $db->setQuery($q1);


        $db =& JFactory::getDBO();

        $query = $db->getQuery(true);
        // Wybieranie z bazy wszystkich ID i nazw opublikowanych metod wysyłki.
        $query->select($db->quoteName(array('tab.virtuemart_shipmentmethod_id', 'tabLang.shipment_name')))
            ->from($db->quoteName('#__virtuemart_shipmentmethods', 'tab'))
            ->join('RIGHT', $db->quoteName('#__virtuemart_shipmentmethods_'. $this->Lang(), 'tabLang') . ' ON (' . $db->quoteName('tab.virtuemart_shipmentmethod_id') . ' = ' . $db->quoteName('tabLang.virtuemart_shipmentmethod_id') . ')')
            ->where($db->quoteName('tab.published') . ' = 1');
        $db->setQuery($query);

        return $db->loadObjectList();
    }

    public function getPayment()
    {

        //        $sql_clear = 'SELECT `tab`.`virtuemart_paymentmethod_id`, `tabLang`.`payment_name`
        //        FROM `j25vm_virtuemart_paymentmethods` AS `tab`
        //        RIGHT JOIN `j25vm_virtuemart_paymentmethods_pl_pl` AS `tabLang`
        //        ON `tab`.`virtuemart_paymentmethod_id` = `tabLang`.`virtuemart_paymentmethod_id`
        //        WHERE `tab`.`published` = 1 ';


        //        $q2 = "SELECT virtuemart_paymentmethod_id AS id, payment_name FROM #__virtuemart_paymentmethods JOIN #__virtuemart_paymentmethods_" . $this->jezyk() . " using(virtuemart_paymentmethod_id)";
        //        $join_sql = "SHOW TABLE STATUS WHERE Name LIKE '%_virtuemart_paymentmethods_%' AND Name NOT LIKE '%_virtuemart_paymentmethods_" . $this->jezyk() . "%'";
        //        $db->setQuery($join_sql);
        //        $joiny = $db->loadObjectList();
        //        foreach ($joiny as $j) {
        //            $q2 .= ' UNION SELECT virtuemart_paymentmethod_id AS id, payment_name FROM #__virtuemart_paymentmethods JOIN ' . $j->Name . ' using(virtuemart_paymentmethod_id)   ';
        //        }
        //        $db->setQuery($q2);
        //
        //        $db->setQuery($q2);


        $db =& JFactory::getDBO();

        $query = $db->getQuery(true);
        // Wybieranie z bazy wszystkich ID i nazw opublikowanych metod płatności.
        $query->select($db->quoteName(array('tab.virtuemart_paymentmethod_id', 'tabLang.payment_name')))
            ->from($db->quoteName('#__virtuemart_paymentmethods', 'tab'))
            ->join('RIGHT', $db->quoteName('#__virtuemart_paymentmethods_'. $this->Lang(), 'tabLang') . ' ON (' . $db->quoteName('tab.virtuemart_paymentmethod_id') . ' = ' . $db->quoteName('tabLang.virtuemart_paymentmethod_id') . ')')
            ->where($db->quoteName('tab.published') . ' = 1');
        $db->setQuery($query);


        return $db->loadObjectList();
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
	protected function loadFormData()
	{
		// Check the session for previously entered form data.

		$data = JFactory::getApplication()->getUserState('com_shipment_payments_vm3.edit.relation.data', array());

        if(empty($data)){
			$data = $this->getItem();
		}
		return $data;
	}


	public function getTable($name = '', $prefix = 'Shipment_Payments_Vm3Table', $options = array())
	{

		return parent::getTable($name, $prefix, $options);
	}
}

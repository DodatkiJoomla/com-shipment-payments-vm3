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
        $db =& JFactory::getDBO();

//        $query
//            ->select($db->quoteName(array('a.virtuemart_shipmentmethod_id', 'a.shipment_name')))
//            ->from($db->quoteName('#__virtuemart_shipmentmethods', 'a'))
//            ->join('INNER', $db->quoteName('#__virtuemart_shipmentmethods_'. $this->jezyk(), 'b') . ' ON (' . $db->quoteName('a.virtuemart_shipmentmethod_id') . ' = ' . $db->quoteName('b.id') . ')')
//            ->where($db->quoteName('b.username') . ' LIKE \'a%\'')
//            ->order($db->quoteName('a.created') . ' DESC');
        $q1 = "SELECT virtuemart_shipmentmethod_id AS id, shipment_name FROM #__virtuemart_shipmentmethods JOIN #__virtuemart_shipmentmethods_" . $this->jezyk() . " using(virtuemart_shipmentmethod_id)";
        $join_sql = "SHOW TABLE STATUS WHERE Name LIKE '%_virtuemart_shipmentmethods_%' AND Name NOT LIKE '%_virtuemart_shipmentmethods_" . $this->jezyk() . "%'";
        $db->setQuery($join_sql);
        $joiny = $db->loadObjectList();
        foreach ($joiny as $j) {
            $q1 .= ' UNION SELECT virtuemart_shipmentmethod_id AS id, shipment_name FROM #__virtuemart_shipmentmethods JOIN ' . $j->Name . ' using(virtuemart_shipmentmethod_id)   ';
        }


        $db->setQuery($q1);
        return $db->loadObjectList();
    }

    public function getPayment()
    {
        $db =& JFactory::getDBO();

        $q2 = "SELECT virtuemart_paymentmethod_id AS id, payment_name FROM #__virtuemart_paymentmethods JOIN #__virtuemart_paymentmethods_" . $this->jezyk() . " using(virtuemart_paymentmethod_id)";
        // dodanie kolejnych tabel translacji!
        $join_sql = "SHOW TABLE STATUS WHERE Name LIKE '%_virtuemart_paymentmethods_%' AND Name NOT LIKE '%_virtuemart_paymentmethods_" . $this->jezyk() . "%'";
        $db->setQuery($join_sql);
        $joiny = $db->loadObjectList();
        foreach ($joiny as $j) {
            $q2 .= ' UNION SELECT virtuemart_paymentmethod_id AS id, payment_name FROM #__virtuemart_paymentmethods JOIN ' . $j->Name . ' using(virtuemart_paymentmethod_id)   ';
        }
        $db->setQuery($q2);

        $db->setQuery($q2);
        return $db->loadObjectList();
    }

    /*
  * Obsługa języka.
  */
    public function jezyk()
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

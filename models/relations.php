<?php
// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

class Shipment_Payments_Vm3ModelRelations extends JModelAdmin
{
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.

		$form = $this->loadForm('com_shipment_payments_vm3.shipment_payments_vm3', 'relation', array('control' => 'jform', 'load_data' => $loadData));

        return $form;
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

        $db = JFactory::getDBO();

        $query = $db->getQuery(true);
        //
        $query->select($db->quoteName(array('xref.id', 'xref.virtuemart_paymentmethod_id',
                        'payLang.payment_name',
                        'xref.virtuemart_shipmentmethod_id',
                        'shipLang.shipment_name'
        )))
            ->from($db->quoteName('#__vm3_shipmentmethod_paymentmethods_xref', 'xref'))
            ->join('RIGHT', $db->quoteName('#__virtuemart_paymentmethods_'. $this->Lang(), 'payLang') . ' ON (' . $db->quoteName('xref.virtuemart_paymentmethod_id') . ' = ' . $db->quoteName('payLang.virtuemart_paymentmethod_id') . ')')
            ->join('RIGHT', $db->quoteName('#__virtuemart_shipmentmethods_'. $this->Lang(), 'shipLang') . ' ON (' . $db->quoteName('xref.virtuemart_shipmentmethod_id') . ' = ' . $db->quoteName('shipLang.virtuemart_shipmentmethod_id') . ')');

        $db->setQuery($query);


        return $db->loadObjectList();
    }
	public function getTable($name = 'Relation', $prefix = 'Shipment_Payments_Vm3Table', $options = array())
	{

		return parent::getTable($name, $prefix, $options);
	}
}

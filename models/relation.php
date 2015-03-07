<?php
// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

class Shipment_Payments_Vm3ModelRelation extends JModelAdmin
{
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_shipment_payments_vm3.relation', 'relation', array('control' => 'jform', 'load_data' => $loadData));
		return $form;
	}

	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_shipment_payments_vm3.edit.helloworld.data', array());
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

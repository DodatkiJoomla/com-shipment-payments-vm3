<?php

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class Shipment_Payments_Vm3ViewRelation extends JViewLegacy
{
	public function display($tpl = null) 
	{
        $app = JFactory::getApplication();
        $model = $this->getModel();
        /** @var Shipment_Payments_Vm3ModelRelation $model */

		// get the Data
        $this->itemId = $app->input->get('id', 0, 'INT');
        $this->isNew = $this->itemId > 0 ? true : false;
        if ($this->isNew) {
            $this->shipmentList = $model->getShipments();
            $this->paymentList = $model->getPayments();
        } else {
            $this->shipmentList = $model->getShipments(true);
            $this->paymentList = $model->getPayments(true);
        }

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	}

	protected function addToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
        JToolBarHelper::title(JText::_('COM_SHIPMENT_PAMYNETS_VM3'));
        JToolBarHelper::save('relation.save');
        JToolBarHelper::cancel('relation.cancel', $this->isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}

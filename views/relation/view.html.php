<?php

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class Shipment_Payments_Vm3ViewRelation extends JView
{
	public function display($tpl = null) 
	{
        $app = JFactory::getApplication();

		// get the Data
        $this->shipmentList = $this->get('Shipments');
        $this->paymentList = $this->get('Payments');
        $this->itemId = $app->input->get('id', 0, 'INT');

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	protected function addToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
        JToolBarHelper::title(JText::_('COM_SHIPMENT_PAMYNETS_VM3'));
//        JToolBarHelper::addNew('relation.add');
        JToolBarHelper::save('relation.save');
        $isNew = false;
        JToolBarHelper::cancel('relation.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
//		$isNew = ($this->item->id == 0);
//		JToolBarHelper::title($isNew ? JText::_('COM_SHIPMENT_PAMYNETS_VM3') : JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLD_EDIT'), 'helloworld');
//		JToolBarHelper::save('helloworld.save');
//		JToolBarHelper::cancel('helloworld.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}

	protected function setDocument() 
	{
//		$isNew = ($this->item->id < 1);
//		$document = JFactory::getDocument();
//		$document->setTitle($isNew ? JText::_('COM_HELLOWORLD_HELLOWORLD_CREATING') : JText::_('COM_HELLOWORLD_HELLOWORLD_EDITING'));
//		$document->addScript(JURI::root() . "media/com_helloworld/js/helloworld.js");
	}
}

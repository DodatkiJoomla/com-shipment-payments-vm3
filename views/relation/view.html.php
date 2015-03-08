<?php

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class Shipment_Payments_Vm3ViewRelation extends JView
{
	public function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');

		$item = $this->get('Item');


//        var_dump($this->getModel());

		// Assign the Data
		$this->form = $form;
		$this->item = $item;

//        var_dump($this->form);

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
        JToolBarHelper::addNew('relation.add');
        JToolBarHelper::save('relation.save');
        JToolBarHelper::cancel('relation.cancel');
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

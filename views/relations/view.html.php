<?php

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class Shipment_Payments_Vm3ViewRelations extends JViewLegacy
{
    public function display($tpl = null)
    {
        // Get the Data
        $model = $this->getModel();
        /** @var Shipment_Payments_Vm3ModelRelations $model */

        $this->data = $model->getData();

        // Set the toolbar
        $this->addToolBar();

        // Display the template
        parent::display($tpl);
    }

    protected function addToolBar()
    {
        JToolBarHelper::title(JText::_('COM_SHIPMENT_PAMYNETS_VM3'));
        JToolBarHelper::addNew('relation.add');
    }
}

<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controllerform library
jimport('joomla.application.component.controllerform');

class Shipment_Payments_Vm3ControllerRelation extends JControllerForm
{
    /**
     * Method to save a record.
     *
     * @param   string  $key     The name of the primary key of the URL variable.
     * @param   string  $urlVar  The name of the URL variable if different from the primary key (sometimes required to avoid router collisions).
     *
     * @return  boolean  True if successful, false otherwise.
     *
     * @since   11.1
     */
    public function save($key = null, $urlVar = null)
    {
        var_dump('aaaa');
        $app = JFactory::getApplication();
        $model = $this->getModel();
        /** @var $model Shipment_Payments_Vm3ModelRelation */

        // Validation
        $virtuemartShipmentmethodId = $app->input->get('virtuemart_shipmentmethod_id', 0, 'INT');
        $virtuemartPaymentmethodsId = $app->input->get('virtuemart_paymentmethods_id', array(), 'ARRAY');

        if($virtuemartShipmentmethodId==0) {
            $this->setRedirect(
                JRoute::_('index.php?option='.$this->option.'&view='.($itemId > 0 ? $this->view_item.$this->getRedirectToItemAppend() : $this->view_list.$this->getRedirectToListAppend()).($itemId > 0 ? '&id='.$itemId : ''), false),
                'Zdefiniuj metodę wysyłki',
                'error'
            );
            return true;
        }

        if(!count($virtuemartPaymentmethodsId)) {
            $this->setRedirect(
                JRoute::_('index.php?option='.$this->option.'&view='.($itemId > 0 ? $this->view_item.$this->getRedirectToItemAppend() : $this->view_list.$this->getRedirectToListAppend()).($itemId > 0 ? '&id='.$itemId : ''), false),
                'Zdefiniuj metody płatności',
                'error'
            );
        }

        if($model->saveRelation($virtuemartShipmentmethodId, $virtuemartPaymentmethodsId)) {
            $this->setRedirect(
                JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list.$this->getRedirectToListAppend(), false),
                'Zapisano powiązanie',
                'message'
            );
            return true;
        }

        return false;
    }

    public function cancel()
    {
        $this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list.$this->getRedirectToListAppend(), false));
        return true;
    }
}
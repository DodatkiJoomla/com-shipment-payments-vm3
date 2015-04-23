<?php
/**
 * Author: Łukasz Duda / DodatkiJoomla.pl
 * Date & time: 2015-02-24 20:07
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<form action="<?php echo JRoute::_('index.php?option=com_shipment_payments_vm3'); ?>"
      method="post" name="adminForm" id="adminForm">
    <fieldset class="adminform">
        <legend><?php echo JText::_('COM_SHIPMENT_PAMYNETS_VM3_LINK_FORM_DETAIL'); ?></legend>
        <label for="virtuemart_shipmentmethod_id"><?php echo JText::_('COM_SHIPMENT_PAMYNETS_VM3_DELIVERY_METHOD'); ?></label>
        <select name="virtuemart_shipmentmethod_id" id="virtuemart_shipmentmethod_id">
            <?php
            foreach ($this->shipmentList as $row) {
                $selected = $this->isNew && $row->virtuemart_shipmentmethod_id==$this->itemId ? ' selected="selected" ' : '';
                echo '<option value="' . $row->virtuemart_shipmentmethod_id . '" '.$selected.'>' . $row->shipment_name . '</option>';
            }
            ?>
        </select>

        <label for="virtuemart_paymentmethod_id"><?php echo JText::_('COM_SHIPMENT_PAMYNETS_VM3_PAYMENT_METHOD'); ?></label>
        <select name="virtuemart_paymentmethods_id[]" id="virtuemart_paymentmethod_id" multiple>
            <?php
            foreach ($this->paymentList as $row) {
//                $selected = $this->isNew && $row->virtuemart_shipmentmethod_id==$this->itemId ? ' selected="selected" ' : '';
                echo '<option value="' . $row->virtuemart_paymentmethod_id . '">' . $row->payment_name . '</option>';
            }
            ?>
        </select>
    </fieldset>
    <div>
        <input type="hidden" name="task" value="relation.edit"/>
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>






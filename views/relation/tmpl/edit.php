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
<form action="<?php echo JRoute::_('index.php?option=com_shipment_payments_vm3&view=relation&layout=edit&tmpl=component'); ?>"
      method="post" name="adminForm" id="adminForm">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'COM_SHIPMENT_PAMYNETS_VM3_LINK_FORM_DETAIL' ); ?></legend>
        <label for="virtuemart_shipmentmethod_id"><?php echo JText::_( 'COM_SHIPMENT_PAMYNETS_VM3_DELIVERY_METHOD' ); ?></label>
        <select name="virtuemart_shipmentmethod_id" type="list" default="" description="" id="virtuemart_shipmentmethod_id">
            <?php
            foreach ($this->get('Delivery') as $row) {
                echo '<option value="' . $row->id . '">' . $row->shipment_name . '</option>';
            }


            ?>

        </select>
        <label for="virtuemart_paymentmethod_id"><?php echo JText::_( 'COM_SHIPMENT_PAMYNETS_VM3_PAYMENT_METHOD' ); ?></label>
        <select name="virtuemart_paymentmethod_id" type="list" default="" description="" id="virtuemart_paymentmethod_id" multiple>
            <?php
            foreach ($this->get('Payment') as $row) {
                echo '<option value="' . $row->id . '">' . $row->payment_name . '</option>';
            }


            ?>

        </select>
    </fieldset>
    <div>
        <input type="submit" value="Zapisz" />
        <input type="hidden" name="task" value="relation.edit" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>






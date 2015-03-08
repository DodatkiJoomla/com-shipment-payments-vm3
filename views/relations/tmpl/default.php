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
<form action="<?php echo JRoute::_('index.php?option=com_shipment_payments_vm3&view=relation&layout=edit'); ?>"
      method="post" name="adminForm" id="adminForm">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'COM_HELLOWORLD_HELLOWORLD_DETAILS' ); ?></legend>
        <label for="shipment_id"><?php echo JText::_( 'COM_HELLOWORLD_HELLOWORLD_DETAILS' ); ?></label>
        <select name="shipment_id" type="list" default="" description="" id="shipment_id">
            <?php
            foreach ($this->get('Shipment') as $row) {
                echo '<option value="' . $row->id . '">' . $row->shipment_name . '</option>';
            }

            ?>

        </select>

    </fieldset>
    <div>
        <input type="hidden" name="task" value="relation.edit" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>


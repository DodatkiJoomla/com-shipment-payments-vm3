<?php
/**
 * Author: Łukasz Duda / DodatkiJoomla.pl
 * Date & time: 2015-02-24 20:07
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<form action="<?php echo JRoute::_('index.php?option=com_shipment_payments_vm'); ?>"
      method="post" name="adminForm" id="adminForm">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'COM_HELLOWORLD_HELLOWORLD_DETAILS' ); ?></legend>
        <ul class="adminformlist">
<!--            --><?php //foreach($this->form->getFieldset() as $field): ?>
<!--                <li>--><?php //echo $field->label;echo $field->input;?><!--</li>-->
<!--            --><?php //endforeach; ?>
        </ul>
    </fieldset>
    <div>
        <input type="hidden" name="task" value="helloworld.edit" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
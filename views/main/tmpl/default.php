<?php
/**
 * Author: Łukasz Duda / DodatkiJoomla.pl
 * Date & time: 2015-02-24 20:07
 */
?>
<form action="<?php echo JRoute::_('index.php?option=com_shipment_payments_vm3'); ?>"
      method="post" name="adminForm" id="shipment_payments_vm3-form" class="form-validate">
    <div>
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>

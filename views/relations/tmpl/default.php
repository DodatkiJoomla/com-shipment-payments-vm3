<?php
/**
 * Author: Łukasz Duda / DodatkiJoomla.pl
 * Date & time: 2015-02-24 20:07
 */
?>

<form action="index.php?option=com_shipment_payments_vm3"
      method="post" name="adminForm" id="shipment_payments_vm3-form" class="form-validate">
    <div class="filter-search fltlft">
        <label class="filter-search-lbl" for="filter_search">Filtr:</label>
        <input type="text" name="filter_search" id="filter_search" value="" title="Wyszukaj kontakty według nazwy">
        <button type="submit">Znajdź</button>
        <button type="button" onclick="document.id('filter_search').value='';this.form.submit();">Wyczyść</button>
    </div>
    <div>
        <input type="hidden" name="task" value=""/>
        <?php echo JHtml::_('form.token'); ?>
        <table class="adminlist">
            <thead>
            <tr>
                <th width="1%">
                    <input type="checkbox" name="checkall-toggle" value=""
                           title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)"/>

                </th>
                <th width="2%">
                    <?php echo JText::_('COM_SHIPMENT_PAMYNETS_VM3_NUM'); ?>
                </th>
                <th width="2%">
                    <?php echo JText::_('COM_SHIPMENT_PAMYNETS_VM3_PUBLISHING'); ?>
                </th>
                <th>
                    <?php echo JText::_('COM_SHIPMENT_PAMYNETS_VM3_DELIVERY'); ?>
                </th>
                <th>
                    <?php echo JText::_('COM_SHIPMENT_PAMYNETS_VM3_DELIVERY_PAYMENT'); ?>
                </th>
                <th width="1%">
                    <?php echo JText::_('JGRID_HEADING_ID'); ?>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php

            if ($this->get('Data')) {
                $i = 1;
                foreach ($this->get('Data') as $row) {


                    echo "<tr>";
                    echo "<td>" . JHtml::_('grid.id', $i, $row['virtuemart_shipmentmethod_id']) . "</td>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . JHtml::_('jgrid.published', $row['published'], $i, 'categories.') . "</td>";
                    echo "<td><a href='" . JRoute::_('index.php?option=com_shipment_payments_vm3&view=relation&layout=edit&id=' . $row['virtuemart_shipmentmethod_id']) . "'>" . $row['shipment_name'] . "</a></td>";
                    echo "<td>";
                    echo "<ul>";
                    foreach ($row['payments'] as $key) {
                        echo "<li>" . $key['payment_name'];
                    }
                    echo "</ul>";
                    echo "</td>";
                    echo "<td>" . $row['virtuemart_shipmentmethod_id'] . "</td>";
                    echo "</tr>";
                    $i++;
                }
            } else {
                echo "<tr>";
                echo "<td colspan='5'>Brak powiązań!</td>";
                echo "</tr>";
            }


            ?>
            </tbody>

            <tfoot>
            <tr>
                <td colspan="10">
                    <div class="container">
                        <div class="pagination">

                            <div class="limit">Pokaż <select id="limit" name="limit" class="inputbox" size="1"
                                                             onchange="Joomla.submitform();">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20" selected="selected">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="0">Wszystkie</option>
                                </select>
                            </div>
                            <div class="limit"></div>
                            <input type="hidden" name="limitstart" value="0">
                        </div>
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</form>

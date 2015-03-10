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
            <thead >
            <tr>
                <th>
                    LP
                </th>
                <th>
                    Publikacja
                </th>
                <th>
                    Wysyłki
                </th>
                <th>
                    Powiązane Płatności
                </th>
                <th>
                    ID
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            if( $this->get('Data') ) {
                $i = 1;
                foreach ($this->get('Data') as $row) {
                    echo "<tr>";
                    echo "<td>". $i ."</td>";
                    echo "<td><button>Włącz/Wyłącz</button></td>";
                    echo "<td>". $row->shipment_name ."</td>";
                    echo "<td>". $row->payment_name ."</td>";
                    echo "<td>". $row->id ."</td>";
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
                    <div class="container"><div class="pagination">

                            <div class="limit">Pokaż <select id="limit" name="limit" class="inputbox" size="1" onchange="Joomla.submitform();">
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
                        </div></div>				</td>
            </tr>
            </tfoot>
        </table>
    </div>
</form>

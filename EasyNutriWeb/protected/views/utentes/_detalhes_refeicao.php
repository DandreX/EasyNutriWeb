<?php //$dataProvider CActiveDataProvider ?>
<?php if ($dataProvider != null): ?>
    <h4>Detalhes</h4>


<?php
//echo TbHtml::formActions(array(
//    TbHtml::inlineCheckBoxList('Checkbox', '', array(
//        'option1' => 'Calorias',
//        'option2' => 'Proteinas',
//        'option3' => 'Hidratos de Carbono',
//        'option4' => 'Lipidos',
//        'option5' => 'Açúcares',
//        'option6' => 'Fibras'
//    ))
//));
//
    ?>

    <div id="detalhesRefeicao">

        <?php if ($dataProvider != null) {
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type' => TbHtml::GRID_TYPE_BORDERED,
                'id' => 'detalhes_refeicao',
                'dataProvider' => $dataProvider,
                'template' => "{items}",
                'selectableRows' => 1,
                'htmlOptions' => array('id' => 'detalhes_Refeicao'),
                'columns' => array(
                    array(
                        'value' => '$data->nome',
                        'header' => 'Alimento',
                    ),
                    array(
                        'value' => '$data->quant',
                        'header' => 'Quantidade (100g)',
                    ),
                    array(
                        'value' => '$data->hidratos_carbono',
                        'header' => 'Hidratos de Carbono (g)',
                    ),
                    array(
                        'value' => '$data->acucares',
                        'header' => 'Açúcares (g)',
                    ),
                    array(
                        'value' => '$data->proteinas',
                        'header' => 'Proteinas (g)',
                    ),
                    array(
                        'value' => '$data->lipidos',
                        'header' => 'Lipidos (g)',
                    ),
                    array(
                        'value' => '$data->fibras',
                        'header' => 'Fibras (g)',
                    ),
                    array(
                        'value' => '$data->agua',
                        'header' => 'Água (g)',
                    ),
                    array(
                        'value' => '$data->calorias',
                        'header' => 'Calorias (Kcal)',
                    ),
                ),

            ));
        }
        ?>

    </div>



<?php endif ?>



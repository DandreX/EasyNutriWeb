<h2>Detalhes</h2>
<?php
echo TbHtml::formActions(array(
    TbHtml::inlineCheckBoxList('Checkbox', '', array(
        'option1' => 'Calorias',
        'option2' => 'Proteinas',
        'option3' => 'Hidratos de Carbono',
        'option4' => 'Lipidos',
        'option5' => 'Açúcares',
        'option6' => 'Fibras'
    ))
));
?>

<div id="detalhesRefeicao">
    <?php  $this->widget('bootstrap.widgets.TbGridView', array(
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
                'header' => 'Quantidade',
            ),
            array(
                'value' => '$data->calorias',
                'header' => 'Calorias',
            ),
            array(
                'value' => '$data->hidratos_carbono',
                'header' => 'Hidratos de Carbono',
            ),
            array(
                'value' => '$data->acucares',
                'header' => 'Açúcares',
            ),
            array(
                'value' => '$data->proteinas',
                'header' => 'Proteinas',
            ),
            array(
                'value' => '$data->lipidos',
                'header' => 'Lipidos',
            ),
            array(
                'value' => '$data->fibras',
                'header' => 'Fibras',
            ),
            array(
                'value' => '$data->agua',
                'header' => 'Água',
            ),
        ),

    ));
    ?>

</div>



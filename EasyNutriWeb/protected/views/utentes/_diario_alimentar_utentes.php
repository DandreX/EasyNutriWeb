<?php /* @var $modelDiarioAlimentar DiarioAlimentar */ ?>

<h5>Data</h5>

<?php //echo TbHtml::textField('date', '', array('placeholder' => 'Data'));?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'attribute' => '$modelDiarioAlimentar->data_diario',
    'name' => 'DiarioAlimentar[data_diario]',
    'value' => date('Y-m-d'),
    'language' => 'pt',
    'options' => array(
        'showAnim' => 'fold',
        'dateFormat' => 'yy-mm-dd',
        'changeYear' => 'true',
        'changeMonth' => 'true',
        'maxDate' => 'today',
    ),
));
?>
<?php /* $this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $modelDiarioAlimentar,
    'filter' => $modelDiarioAlimentar,
    'template' => "{items}",
    'columns' => array(
        array(
            'name' => 'id',
            'header' => '#',
            'htmlOptions' => array('color' =>'width: 60px'),
        ),
        array(
            'name' => 'firstName',
            'header' => 'First name',
        ),
        array(
            'name' => 'lastName',
            'header' => 'Last name',
        ),
        array(
            'name' => 'username',
            'header' => 'Username',
        ),
    ),
));*/
?>

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
<?php /* $this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $person->search(),
    'filter' => $person,
    'template' => "{items}",
    'columns' => array(
        array(
            'name' => 'id',
            'header' => '#',
            'htmlOptions' => array('color' =>'width: 60px'),
        ),
        array(
            'name' => 'firstName',
            'header' => 'First name',
        ),
        array(
            'name' => 'lastName',
            'header' => 'Last name',
        ),
        array(
            'name' => 'username',
            'header' => 'Username',
        ),
    ),
));*/
?>



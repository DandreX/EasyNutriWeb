<?php
/* @var $model Alimentos */
/* @var $query string */
?>
<?php echo TbHtml::textField('pesquisa', $query, array(
    'id'=>'queryAlimento',
    'placeholder' => 'Insira alimento...')); ?>
<?php echo TbHtml::button('Pesquisar', array('id' => 'btnQuery')); ?>

<?php

//var_dump($model, $query);
//$dp = $model->search();
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'header' => '#',
            'htmlOptions' => array('color' =>'width: 60px'),
        ),
        array(
            'name' => 'nome',
            'header' => 'First name',
        ),
    ),
)); ?>





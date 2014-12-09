<?php
/* @var $model Alimentos */
/* @var $query string */
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'tabelaPesquisa',
    'dataProvider' => $model,
    'enableSorting' => false,
    'columns' => array(
        array(
            'name' => 'id',
            'header' => '#',
            'htmlOptions' => array('color' =>'width: 15px'),
        ),
        array(
            'name' => 'nome',
            'header' => 'Alimento',
        ),
        array(
            'class'=>'CCheckBoxColumn',
        ),
    ),
)); ?>





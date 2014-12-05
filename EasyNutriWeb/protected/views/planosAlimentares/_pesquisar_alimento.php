<?php
/* @var $model Alimentos */
/* @var $query string */
?>

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





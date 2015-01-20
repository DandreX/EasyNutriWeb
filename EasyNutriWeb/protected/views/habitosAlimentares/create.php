<?php
/* @var $this HabitosAlimentaresController */
/* @var $model HabitosAlimentares */

$this->breadcrumbs=array(
	'Habitos Alimentares'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HabitosAlimentares', 'url'=>array('index')),
	array('label'=>'Manage HabitosAlimentares', 'url'=>array('admin')),
);
?>

<h1>Hábitos Alimentares</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
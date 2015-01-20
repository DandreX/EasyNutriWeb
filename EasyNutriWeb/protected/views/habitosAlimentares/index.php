<?php
/* @var $this HabitosAlimentaresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Habitos Alimentares',
);

$this->menu=array(
	array('label'=>'Create HabitosAlimentares', 'url'=>array('create')),
	array('label'=>'Manage HabitosAlimentares', 'url'=>array('admin')),
);
?>

<h1>Habitos Alimentares</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

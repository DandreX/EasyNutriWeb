<?php
/* @var $this HabitosAlimentaresController */
/* @var $model HabitosAlimentares */

$this->breadcrumbs=array(
	'Habitos Alimentares'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List HabitosAlimentares', 'url'=>array('index')),
	array('label'=>'Create HabitosAlimentares', 'url'=>array('create')),
	array('label'=>'Update HabitosAlimentares', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HabitosAlimentares', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HabitosAlimentares', 'url'=>array('admin')),
);
?>

<h1>View HabitosAlimentares #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hora_local_comp_ref',
		'metod_culin_comum',
		'ing_doce_alim_gordo',
		'ing_hidrica_diaria',
		'activ_fisica',
		'idUtente',
	),
)); ?>

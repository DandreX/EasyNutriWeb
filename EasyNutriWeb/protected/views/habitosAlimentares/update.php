<?php
/* @var $this HabitosAlimentaresController */
/* @var $model HabitosAlimentares */

$this->breadcrumbs=array(
	'Habitos Alimentares'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HabitosAlimentares', 'url'=>array('index')),
	array('label'=>'Create HabitosAlimentares', 'url'=>array('create')),
	array('label'=>'View HabitosAlimentares', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage HabitosAlimentares', 'url'=>array('admin')),
);
?>

<h1>Alterar Hábitos Alimentares <?php echo $model->idUtente0->nome; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
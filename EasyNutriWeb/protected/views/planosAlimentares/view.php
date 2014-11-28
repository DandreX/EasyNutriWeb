<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentares */

$this->breadcrumbs=array(
	'Planos Alimentares'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List PlanosAlimentares', 'url'=>array('index')),
	array('label'=>'Create PlanosAlimentares', 'url'=>array('create')),
	array('label'=>'Update PlanosAlimentares', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete PlanosAlimentares', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlanosAlimentares', 'url'=>array('admin')),
);
?>

<h1>View PlanosAlimentares #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'id_utente',
		'id_medico',
		'data_presc',
		'ned',
	),
)); ?>

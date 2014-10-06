<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */

$this->breadcrumbs=array(
	'Dados Antros'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DadosAntro', 'url'=>array('index')),
	array('label'=>'Create DadosAntro', 'url'=>array('create')),
	array('label'=>'Update DadosAntro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DadosAntro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DadosAntro', 'url'=>array('admin')),
);
?>

<h1>View DadosAntro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo_medicao_id',
		'valor',
		'data_med',
		'unidade',
		'utente_id',
	),
)); ?>

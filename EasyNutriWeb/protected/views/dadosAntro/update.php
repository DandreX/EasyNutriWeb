<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */

$this->breadcrumbs=array(
	'Dados Antros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DadosAntro', 'url'=>array('index')),
	array('label'=>'Create DadosAntro', 'url'=>array('create')),
	array('label'=>'View DadosAntro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DadosAntro', 'url'=>array('admin')),
);
?>

<h1>Alterar Dados Antropométricos</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'mensagem'=>$mensagem)); ?>
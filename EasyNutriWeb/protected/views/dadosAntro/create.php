<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */

//$this->breadcrumbs=array(
//	'Dados Antros'=>array('index'),
//	'Create',
//);

$this->menu=array(
//	array('label'=>'List DadosAntro', 'url'=>array('index')),
	array('label'=>'Todos os registos', 'url'=>array('admin')),
);
?>

<h1>Novo Registo Antropométrico</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
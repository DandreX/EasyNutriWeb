<?php
/* @var $this UtentesController */
/* @var $model Utentes */

//$this->breadcrumbs=array(
//	'Utentes'=>array('index'),
//	'Create',
//);

$this->menu=array(
	//array('label'=>'List Utentes', 'url'=>array('index')),
	array('label'=>'Meus Utentes', 'url'=>array('admin')),
);
?>

<h1>Novo Utente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
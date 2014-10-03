<?php
/* @var $this UtentesController */
/* @var $usersModel */
/* @var $model Utentes */

$this->breadcrumbs=array(
	'Utentes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Utentes', 'url'=>array('index')),
	array('label'=>'Manage Utentes', 'url'=>array('admin')),
);
?>

<h1>Create Utentes</h1>

<?php $this->renderPartial('_form', array(
    'model'=>$model,
    'usersModel'=>$usersModel,

)); ?>
<?php
/* @var $this FichaClinicaController */
/* @var $model FichaClinica */

$this->breadcrumbs=array(
	'Fichas Clinicas'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'List FichaClinica', 'url'=>array('index')),
	array('label'=>'Manage FichaClinica', 'url'=>array('admin')),
);
?>

<h1>Ficha Clínica</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
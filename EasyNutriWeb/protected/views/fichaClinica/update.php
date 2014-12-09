<?php
/* @var $this FichaClinicaController */
/* @var $model FichaClinica */

$this->breadcrumbs=array(
	'Fichas Clinicas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Alterar',
);

$this->menu=array(
	array('label'=>'List FichaClinica', 'url'=>array('index')),
	array('label'=>'Create FichaClinica', 'url'=>array('create')),
	array('label'=>'View FichaClinica', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FichaClinica', 'url'=>array('admin')),
);
?>

<h1>Alterar Ficha Clinica <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
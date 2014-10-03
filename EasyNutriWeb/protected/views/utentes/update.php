<?php
/* @var $this UtentesController */
/* @var $model Utentes */

$this->breadcrumbs=array(
	'Utentes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Utentes', 'url'=>array('index')),
	array('label'=>'Create Utentes', 'url'=>array('create')),
	array('label'=>'View Utentes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Utentes', 'url'=>array('admin')),
);
?>

<h1>Update Utentes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
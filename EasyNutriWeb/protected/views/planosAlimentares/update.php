<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentares */

$this->breadcrumbs=array(
	'Planos Alimentares'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PlanosAlimentares', 'url'=>array('index')),
	array('label'=>'Create PlanosAlimentares', 'url'=>array('create')),
	array('label'=>'View PlanosAlimentares', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage PlanosAlimentares', 'url'=>array('admin')),
);
?>

<h1>Update PlanosAlimentares <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
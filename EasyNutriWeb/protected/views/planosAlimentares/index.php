<?php
/* @var $this PlanosAlimentaresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Planos Alimentares',
);

$this->menu=array(
	array('label'=>'Create PlanosAlimentares', 'url'=>array('create')),
	array('label'=>'Manage PlanosAlimentares', 'url'=>array('admin')),
);
?>

<h1>Planos Alimentares</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

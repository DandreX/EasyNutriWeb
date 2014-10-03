<?php
/* @var $this UtentesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Utentes',
);

$this->menu=array(
	array('label'=>'Create Utentes', 'url'=>array('create')),
	array('label'=>'Manage Utentes', 'url'=>array('admin')),
);
?>

<h1>Utentes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

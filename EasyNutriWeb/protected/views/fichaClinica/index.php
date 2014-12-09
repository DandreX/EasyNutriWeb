<?php
/* @var $this FichaClinicaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ficha Clinicas',
);

$this->menu=array(
	array('label'=>'Create FichaClinica', 'url'=>array('create')),
	array('label'=>'Manage FichaClinica', 'url'=>array('admin')),
);
?>

<h1>Ficha Clinicas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

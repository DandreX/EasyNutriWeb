<?php
/* @var $this DadosAntroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dados Antros',
);

$this->menu=array(
	array('label'=>'Create DadosAntro', 'url'=>array('create')),
	array('label'=>'Manage DadosAntro', 'url'=>array('admin')),
);
?>

<h1>Dados Antros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

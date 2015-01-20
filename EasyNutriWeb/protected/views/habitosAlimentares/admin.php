<?php
/* @var $this HabitosAlimentaresController */
/* @var $model HabitosAlimentares */

$this->breadcrumbs=array(
	'Habitos Alimentares'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HabitosAlimentares', 'url'=>array('index')),
	array('label'=>'Create HabitosAlimentares', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#habitos-alimentares-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Habitos Alimentares</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'habitos-alimentares-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'hora_local_comp_ref',
		'metod_culin_comum',
		'ing_doce_alim_gordo',
		'ing_hidrica_diaria',
		'activ_fisica',
		/*
		'idUtente',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

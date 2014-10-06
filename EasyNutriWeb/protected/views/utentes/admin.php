<?php
/* @var $this UtentesController */
/* @var $model Utentes */

//$this->breadcrumbs=array(
//	'Utentes'=>array('index'),
//	'Manage',
//);

$this->menu=array(
	//array('label'=>'List Utentes', 'url'=>array('index')),
	array('label'=>'Novo Utente', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#utentes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Os meus utentes</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'utentes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'morada',
		'nome',
		'username',
		'data_nascimento',
		'sexo',
		'email',
		'telefone',
		'nif',

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

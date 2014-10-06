<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */

$this->breadcrumbs=array(
	'Dados Antros'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List DadosAntro', 'url'=>array('index')),
	array('label'=>'Novo registo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dados-antro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Registos Antropométricos</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dados-antro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'nomeUtenteSearch',
            'value'=>'$data->utente ? $data->utente->nome: "-"',
        ),
        array(
            'name'=>'tipoMedicaoSearch',
            'value'=>'$data->tipoMedicao ? $data->tipoMedicao->descricao: "-"'
        ),
		'valor',
        'unidade',
		'data_med',


		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
/* @var $this TipoMedicaoController */
/* @var $model TipoMedicao */

//$this->breadcrumbs = array(
//    'Tipo Medicao' => array('index'),
//    'Gestao',
//);

$this->menu = array(
//    array('label' => 'Lista Tipo Medicao', 'url' => array('index')),
    array('label' => 'Novo parâmetro', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-medicao-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestao dos tipos de medição</h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'tipo-medicao-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'descricao',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>

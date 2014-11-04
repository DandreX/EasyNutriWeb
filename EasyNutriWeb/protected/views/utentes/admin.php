<?php
/* @var $this UtentesController */
/* @var $model Utentes */

//$this->breadcrumbs=array(
//	'Utentes'=>array('index'),
//	'Manage',
//);

$this->menu = array(
    array('label' => 'Meus Utentes', 'url' => '#', 'active' => true),
    //array('label'=>'List Utentes', 'url'=>array('index')),
    array('label' => 'Novo Utente', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#utentes-grid').yiiGridView('update', {
		data: $(this).serialize()
	}).error(function(){alert('erro')});
	return false;
});
");
?>

<h1>Os meus utentes</h1>

<?php Spinner::show(); ?>
<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => TbHtml::GRID_TYPE_HOVER,
    'id' => 'utentes-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'enableSorting' => false,
    'columns' => array(
        'nome',
        'data_nascimento',
        'sexo',
        'telefone',
        'email',
        'username',


        array(
            'class' => 'CButtonColumn',
            // 'afterDelete' => "function(link,success,data){ if (success) alert(data); } ",
        ),
    ),
)); ?>

<?php
/* @var $this NotificacoesController */
/* @var $model Notificacoes */


$this->menu = array(
    array('label' => 'Listar Notificações', 'url' => array('index'), 'active' => true),
    array('label' => 'Nova Notificação', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#notificacoes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Notificações Enviadas</h1>

<!--<p>-->
<!--    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>-->
<!--        &lt;&gt;</b>-->
<!--    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.-->
<!--</p>-->

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<?php echo
TbHtml::button('Nova Notificação', array('id' => 'btnOpenNovaNotificacao', 'color' => TbHtml::BUTTON_COLOR_PRIMARY));
?>
<br>
<br>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => TbHtml::GRID_TYPE_HOVER,
    'id' => 'notificacoes-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'data',
        array(
            'value' => '$data->NomeUtente',
            'header' => 'Utente',
        ),
        'assunto',
        'descricao',
        array(
            'class' => 'TbButtonColumn',
        ),
    ),
)); ?>

<script type="text/javascript">
    $('#btnOpenNovaNotificacao').click(function(){
        var url = '<?php echo Yii::app()->createUrl("notificacoes/create"); ?>';
        location.href = url;
    });
</script>
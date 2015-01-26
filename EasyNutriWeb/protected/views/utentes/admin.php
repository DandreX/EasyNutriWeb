<?php
/* @var $this UtentesController */
/* @var $model Utentes */

$this->breadcrumbs = array(
    'Utentes' => array('index'),
    'Os meus utentes',
);

//$this->menu = array(
//    array('label' => 'Meus Utentes', 'url' => '#', 'active' => true),
//    //array('label'=>'List Utentes', 'url'=>array('index')),
//    array('label' => 'Novo Utente', 'url' => array('create')),
//);

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





<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<?php echo
TbHtml::button('Novo Utente', array('id' => 'btnOpenFormUtentes', 'icon'=>'plus'));
?>
<br>
<br>
<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, 'Clique numa linha para visualizar os dados de um utente.'); ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => TbHtml::GRID_TYPE_HOVER,
    'id' => 'utentes-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'selectableRows'=>1,
//    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id)}',
    'selectionChanged'=>'function(id){viewUtente(id);}',
    'enableSorting' => false,
    'columns' => array(
        'nome',
        'data_nascimento',
        'sexo',
        'telefone',
        'email',
        'username',


        array(
            'class' => 'TbButtonColumn',
            'buttons' => array(
                'update' => array(
                    'visible' => 'false',
                ),
                'delete' => array(
                    'visible' => 'false',
                ),
            ),
            'htmlOptions' => array('width' => 10),
            // 'afterDelete' => "function(link,success,data){ if (success) alert(data); } ",
        ),
    ),
)); ?>

<script type="text/javascript">
    $('#btnOpenFormUtentes').click(function(){
      var url = '<?php echo Yii::app()->createUrl("utentes/create"); ?>';
        location.href = url;
    });

    function viewUtente(id){
        var utenteId =$.fn.yiiGridView.getSelection(id);
        if(utenteId!=''){
            location.href = '<?php echo $this->createUrl('view')?>'+/id/+$.fn.yiiGridView.getSelection(id);
        }
    }

</script>

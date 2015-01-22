<?php
/* @var $dpNotificacoes CActiveDataProvider */

?>
<!---->
<?php echo TbHtml::button('', array('class'=>'btnRefresh', 'icon' => 'refresh', 'onclick'=>'btnRefreshNotificacoes();')); ?>




<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => TbHtml::GRID_TYPE_HOVER,
    'dataProvider' => $dpNotificacoes,
    'columns' => array(
        'data',
        'assunto',
        array(
            'header'=>'Descrição',
            'name'=>'descricao',
            'type'=>'raw',
            'value'=>'nl2br($data->descricao)',
        ),
        array(
            'class' => 'TbButtonColumn',
            'buttons' => array(
                'view' => array(
                    'url' => 'Yii::app()->createUrl("/notificacoes/view", array("id"=>$data->id))',
                    'options' => array('target' => '_new'),
                ),
                'update' => array(
                    'visible' => 'false',
                ),
                'delete' => array(
                    'visible' => 'false',
                ),
            ),
        ),
    ),
)); ?>

<script type="text/javascript">
    $('.form-actions').addClass('btnFormsViewUtentes');
    $('.form-actions').removeClass('form-actions');

    function btnRefreshNotificacoes(){
        window.location = '<?php Yii::app()->getRequest()->getURL(); ?>'+"#tab_6";
        window.location.reload();
    }

</script>
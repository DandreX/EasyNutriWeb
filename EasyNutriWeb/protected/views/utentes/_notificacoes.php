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
        array(
            'value' => '$data->NomeUtente',
            'header' => 'Utente',
        ),
        'assunto',
        'descricao',
        array(
            'class' => 'TbButtonColumn',
            'buttons' => array(
                'view' => array(
                    'url' => 'Yii::app()->createUrl("/notificacoes/view", array("id"=>$data->id))',
                    'options' => array('target' => '_new'),
                ),
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("/notificacoes/delete", array("id"=>$data->id))',
                    'options' => array('target' => '_new'),
                ),
                'update' => array(
                    'url' => 'Yii::app()->createUrl("/notificacoes/update", array("id"=>$data->id))',
                    'options' => array('target' => '_new'),
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
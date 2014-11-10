<?php
/* @var $dpNotificacoes CActiveDataProvider */

?>
<!---->
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

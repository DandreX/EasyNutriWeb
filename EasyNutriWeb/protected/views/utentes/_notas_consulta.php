<?php
/* @var $dpNotasConsulta CActiveDataProvider */

?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_INLINE,
    'action' => Yii::app()->createUrl("notasConsulta/create&idUtente=" . $model->id),
));
?>
<?php
echo TbHtml::formActions(array(
    TbHtml::submitButton('Nova Nota de Consulta'
    ))); ?>
<?php $this->endWidget(); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => TbHtml::GRID_TYPE_HOVER,
    'dataProvider' => $dpNotasConsulta,
    'columns' => array(
        'data',
        'descricao',
        array(
            'class' => 'TbButtonColumn', 'buttons' => array(
//                'view' => array(
//                    'url' => 'Yii::app()->createUrl("/notasConsulta/view", array("id"=>$data->id))',
//                    'options' => array('target' => '_new'),
//                ),
            'delete' => array(
                'url' => 'Yii::app()->createUrl("/notasConsulta/delete", array("id"=>$data->id))',
                'options' => array('target' => '_new'),
            ),
            'update' => array(
                'url' => 'Yii::app()->createUrl("/notasConsulta/update", array("id"=>$data->id))',
                'options' => array('target' => '_new'),
            ),
        ),
        ),
    ),
)); ?>

<script type="text/javascript">
    $('.form-actions').addClass('btnFormsViewUtentes');
    $('.form-actions').removeClass('form-actions');
</script>


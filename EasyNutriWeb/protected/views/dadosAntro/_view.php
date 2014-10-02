<?php
/* @var $this DadosAntroController */
/* @var $data DadosAntro */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::encode($data->user_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('tipo_medicao_id')); ?>:</b>
    <?php echo CHtml::encode($data->tipo_medicao_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
    <?php echo CHtml::encode($data->valor); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('data_med')); ?>:</b>
    <?php echo CHtml::encode($data->data_med); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('unidade')); ?>:</b>
    <?php echo CHtml::encode($data->unidade); ?>
    <br/>


</div>
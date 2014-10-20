<?php
/* @var $this RefeicoesController */
/* @var $data Refeicoes */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('diario_id')); ?>:</b>
    <?php echo CHtml::encode($data->diario_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('tipo_refeicao_id')); ?>:</b>
    <?php echo CHtml::encode($data->tipo_refeicao_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('data_refeicao')); ?>:</b>
    <?php echo CHtml::encode($data->data_refeicao); ?>
    <br/>


</div>
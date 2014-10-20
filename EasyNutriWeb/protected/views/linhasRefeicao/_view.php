<?php
/* @var $this LinhasRefeicaoController */
/* @var $data LinhasRefeicao */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('alimento_id')); ?>:</b>
    <?php echo CHtml::encode($data->alimento_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('quant')); ?>:</b>
    <?php echo CHtml::encode($data->quant); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('refeicao_id')); ?>:</b>
    <?php echo CHtml::encode($data->refeicao_id); ?>
    <br/>


</div>
<?php
/* @var $this NotasConsultaController */
/* @var $data NotasConsulta */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
    <?php echo CHtml::encode($data->descricao); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
    <?php echo CHtml::encode($data->data); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('utente_id')); ?>:</b>
    <?php echo CHtml::encode($data->utente_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('medico_id')); ?>:</b>
    <?php echo CHtml::encode($data->medico_id); ?>
    <br/>


</div>
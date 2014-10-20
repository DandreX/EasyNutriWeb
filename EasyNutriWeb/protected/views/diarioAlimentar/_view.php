<?php
/* @var $this DiarioAlimentarController */
/* @var $data DiarioAlimentar */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::encode($data->user_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('data_diario')); ?>:</b>
    <?php echo CHtml::encode($data->data_diario); ?>
    <br/>


</div>
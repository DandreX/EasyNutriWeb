<?php
/* @var $this NotificacoesController */
/* @var $data Notificacoes */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('utente_id')); ?>:</b>
    <?php echo CHtml::encode($data->getNomeUtente()); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
    <?php echo CHtml::encode($data->data); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('assunto')); ?>:</b>
    <?php echo CHtml::encode($data->assunto); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
    <?php echo CHtml::encode($data->descricao); ?>
    <br/>


</div>
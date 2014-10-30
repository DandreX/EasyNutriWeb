<?php
/* @var $this NotificacoesController */
/* @var $data Notificacoes */
?>

<div class="view">

    <b><?php echo TbHtml::b($data->getAttributeLabel('assunto')); ?>:</b>
    <?php echo CHtml::encode($data->assunto); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
    <?php echo CHtml::encode($data->data); ?>
    <br/>



    <b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
    <?php echo CHtml::encode($data->descricao); ?>
    <br/>


</div>
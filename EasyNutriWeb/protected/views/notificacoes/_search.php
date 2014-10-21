<?php
/* @var $this NotificacoesController */
/* @var $model Notificacoes */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'medico_id'); ?>
        <?php echo $form->textField($model, 'medico_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'utente_id'); ?>
        <?php echo $form->textField($model, 'utente_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'descricao'); ?>
        <?php echo $form->textField($model, 'descricao', array('size' => -1, 'maxlength' => -1)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'data'); ?>
        <?php echo $form->textField($model, 'data'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'assunto'); ?>
        <?php echo $form->textField($model, 'assunto', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
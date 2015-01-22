<?php
?>
<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'notificacoes-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,


    )); ?>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'assunto'); ?>
        <?php echo $form->textField($model, 'assunto', array('size' => 200, 'maxlength' =>200)); ?>
        <?php echo $form->error($model, 'assunto'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'descricao'); ?>
        <?php echo $form->textArea($model, 'descricao', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'descricao'); ?>
    </div>
    <?php $this->endWidget(); ?>

</div>
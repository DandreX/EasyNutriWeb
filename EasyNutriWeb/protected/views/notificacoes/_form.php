<?php
/* @var $this NotificacoesController */
/* @var $model Notificacoes */
/* @var $form CActiveForm */
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

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'utente_id'); ?>
        <?php $listaUtentes = CHtml::listData(Utentes::model()->findAllByAttributes(
                array(),
                $condition = 'medico_id=:userid',
                $params = array(
                    ':userid' => Yii::app()->user->userid,
                )
            ),
            'id', 'nome');
        asort($listaUtentes);
        echo $form->dropDownList($model, 'utente_id', $listaUtentes,
            array('empty' => 'Escolha o Utente',
                'order' => 'nome',)); ?>
        <?php echo $form->error($model, 'utente_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'assunto'); ?>
        <?php echo $form->textField($model, 'assunto', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'assunto'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'descricao'); ?>
        <?php echo $form->textArea($model, 'descricao', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'descricao'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<?php
/* @var $this LinhasRefeicaoController */
/* @var $model LinhasRefeicao */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'linhas-refeicao-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'alimento_id'); ?>
        <?php echo $form->textField($model, 'alimento_id'); ?>
        <?php echo $form->error($model, 'alimento_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'quant'); ?>
        <?php echo $form->textField($model, 'quant'); ?>
        <?php echo $form->error($model, 'quant'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'refeicao_id'); ?>
        <?php echo $form->textField($model, 'refeicao_id'); ?>
        <?php echo $form->error($model, 'refeicao_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
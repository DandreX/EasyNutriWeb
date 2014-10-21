<?php
/* @var $this AlimentosController */
/* @var $model Alimentos */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'alimentos-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'id'); ?>
        <?php echo $form->textField($model, 'id', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nome'); ?>
        <?php echo $form->textField($model, 'nome', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'nome'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'kcal'); ?>
        <?php echo $form->textField($model, 'kcal'); ?>
        <?php echo $form->error($model, 'kcal'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'agua'); ?>
        <?php echo $form->textField($model, 'agua'); ?>
        <?php echo $form->error($model, 'agua'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'proteinas'); ?>
        <?php echo $form->textField($model, 'proteinas'); ?>
        <?php echo $form->error($model, 'proteinas'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'lipidos'); ?>
        <?php echo $form->textField($model, 'lipidos'); ?>
        <?php echo $form->error($model, 'lipidos'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'hidratos_carbono'); ?>
        <?php echo $form->textField($model, 'hidratos_carbono'); ?>
        <?php echo $form->error($model, 'hidratos_carbono'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'acucares'); ?>
        <?php echo $form->textField($model, 'acucares'); ?>
        <?php echo $form->error($model, 'acucares'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fibras'); ?>
        <?php echo $form->textField($model, 'fibras'); ?>
        <?php echo $form->error($model, 'fibras'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
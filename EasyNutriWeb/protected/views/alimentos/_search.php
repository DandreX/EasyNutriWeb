<?php
/* @var $this AlimentosController */
/* @var $model Alimentos */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'nome'); ?>
        <?php echo $form->textField($model, 'nome', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'kcal'); ?>
        <?php echo $form->textField($model, 'kcal'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'agua'); ?>
        <?php echo $form->textField($model, 'agua'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'proteinas'); ?>
        <?php echo $form->textField($model, 'proteinas'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'lipidos'); ?>
        <?php echo $form->textField($model, 'lipidos'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'hidratos_carbono'); ?>
        <?php echo $form->textField($model, 'hidratos_carbono'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'acucares'); ?>
        <?php echo $form->textField($model, 'acucares'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'fibras'); ?>
        <?php echo $form->textField($model, 'fibras'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
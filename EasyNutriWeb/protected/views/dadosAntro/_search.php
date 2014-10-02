<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */
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
        <?php echo $form->label($model, 'user_id'); ?>
        <?php echo $form->textField($model, 'user_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'tipo_medicao_id'); ?>
        <?php echo $form->textField($model, 'tipo_medicao_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'valor'); ?>
        <?php echo $form->textField($model, 'valor'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'data_med'); ?>
        <?php echo $form->textField($model, 'data_med'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'unidade'); ?>
        <?php echo $form->textField($model, 'unidade', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
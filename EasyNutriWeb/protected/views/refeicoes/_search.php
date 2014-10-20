<?php
/* @var $this RefeicoesController */
/* @var $model Refeicoes */
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
        <?php echo $form->label($model, 'diario_id'); ?>
        <?php echo $form->textField($model, 'diario_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'tipo_refeicao_id'); ?>
        <?php echo $form->textField($model, 'tipo_refeicao_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'data_refeicao'); ?>
        <?php echo $form->textField($model, 'data_refeicao'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
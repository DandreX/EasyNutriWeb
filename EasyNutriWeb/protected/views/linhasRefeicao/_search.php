<?php
/* @var $this LinhasRefeicaoController */
/* @var $model LinhasRefeicao */
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
        <?php echo $form->label($model, 'alimento_id'); ?>
        <?php echo $form->textField($model, 'alimento_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'quant'); ?>
        <?php echo $form->textField($model, 'quant'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'refeicao_id'); ?>
        <?php echo $form->textField($model, 'refeicao_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
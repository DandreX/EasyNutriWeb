<?php
/* @var $this HabitosAlimentaresController */
/* @var $model HabitosAlimentares */
/* @var $form CActiveForm */
?>

<div class="formHabitosAlimentares">

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id' => 'utentes-form',
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="dadosHabitosAlimentares">
        <?php echo $form->textAreaControlGroup($model,'hora_local_comp_ref',array('rows' => 6, 'cols' => 100)); ?>
        <?php echo $form->error($model,'hora_local_comp_ref'); ?>
    </div>

    <div class="dadosHabitosAlimentares">
        <?php echo $form->textAreaControlGroup($model,'metod_culin_comum',array('rows' => 6, 'cols' => 100)); ?>
        <?php echo $form->error($model,'metod_culin_comum'); ?>
    </div>

    <div class="dadosHabitosAlimentares">
        <?php echo $form->textAreaControlGroup($model,'ing_doce_alim_gordo',array('rows' => 6, 'cols' => 100)); ?>
        <?php echo $form->error($model,'ing_doce_alim_gordo'); ?>
    </div>

    <div class="dadosHabitosAlimentares">
        <?php echo $form->textAreaControlGroup($model,'ing_hidrica_diaria',array('rows' => 6, 'cols' => 100)); ?>
        <?php echo $form->error($model,'ing_hidrica_diaria'); ?>
    </div>

    <div class="dadosHabitosAlimentares">
        <?php echo $form->textAreaControlGroup($model,'activ_fisica',array('rows' => 6, 'cols' => 100)); ?>
        <?php echo $form->error($model,'activ_fisica'); ?>
    </div>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? 'Criar' : 'Guardar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->
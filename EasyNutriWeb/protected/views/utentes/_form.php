<?php
/* @var $this UtentesController */
/* @var $model Utentes */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'utentes-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'nome'); ?>
        <?php echo $form->textField($model, 'nome', array('size' => 60, 'maxlength' => 150)); ?>
        <?php echo $form->error($model, 'nome'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'sexo'); ?>
        <?php echo $form->radioButtonList($model, 'sexo', Utentes::model()->sexos); ?>
        <?php echo $form->error($model, 'sexo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'data_nascimento'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'attribute' => 'DataNascimento',
            'name' => 'Utentes[data_nascimento]',
            'value' => $model->data_nascimento,
            'language' => 'pt',
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
                'changeYear' => 'true',
                'changeMonth' => 'true',
                'maxDate' => 'today',
            ),
        ));
        ?>
        <?php echo $form->error($model, 'data_nascimento'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'profissao'); ?>
        <?php echo $form->textField($model, 'profissao', array('size' => 60, 'maxlength' => 150)); ?>
        <?php echo $form->error($model, 'profissao'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'estado_civil'); ?>
        <?php echo $form->dropDownList($model, 'estado_civil',
            array('Solteiro' => 'Solteiro', 'Casado' => 'Casado', 'Viuvo' => 'Viuvo', 'Divorciado' => 'Divorciado'),
            array('empty' => 'Escolha o estado civil')); ?>
        <?php echo $form->error($model, 'estado_civil'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'morada'); ?>
        <?php echo $form->textArea($model, 'morada', array('rows' => 4, 'cols' => 60)); ?>
        <?php echo $form->error($model, 'morada'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 150)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'telefone'); ?>
        <?php echo $form->textField($model, 'telefone', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'telefone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nif'); ?>
        <?php echo $form->textField($model, 'nif', array('size' => 11, 'maxlength' => 11)); ?>
        <?php echo $form->error($model, 'nif'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'motivo_consulta'); ?>
        <?php echo $form->textArea($model, 'motivo_consulta', array('rows' => 4, 'cols' => 60)); ?>
        <?php echo $form->error($model, 'motivo_consulta'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
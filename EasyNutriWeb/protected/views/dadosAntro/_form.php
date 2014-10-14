<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'dados-antro-form',
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
        <?php $utentes = CHtml::listData(Utentes::model()->findAll(), 'id', 'nome');
        echo $form->dropDownList($model, 'utente_id', $utentes,
            array('empty' => 'Escolha o Utente', 'order' => 'nome'));?>
        <?php echo $form->error($model, 'user_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tipo_medicao_id'); ?>
        <?php $medicoes = CHtml::listData(TipoMedicao::model()->findAll(), 'id', 'descricao');
        echo $form->dropDownList($model, 'tipo_medicao_id', $medicoes,
            array('empty' => 'Escolha o tipo de medicao', 'order' => 'descricao'));?>
        <?php echo $form->error($model, 'tipo_medicao_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'valor'); ?>
        <?php echo $form->textField($model, 'valor'); ?>
        <?php echo $form->error($model, 'valor'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'data_med'); ?>
        <?php
        $form->widget('application.extensions.timepicker.timepicker', array(
            'model' => $model,
            'name' => 'data_med',
            'options' => array(

                'showOn' => 'focus',
                'maxDate' => 'today',
            ),
        ));
        ?>
        <?php echo $form->error($model, 'data_med'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Alterar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
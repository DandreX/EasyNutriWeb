<?php
/* @var $this NotasConsultaController */
/* @var $model NotasConsulta */
/* @var $form CActiveForm */
?>

<div class="formNotaConsulta">

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id' => 'utentes-form',
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="control-group">
            <?php echo $form->label($model, 'data', array('class' => 'control-label required')); ?>
            <div class="controls">
                <?php
                $model->data = date('Y-m-d H:i');
                $form->widget('application.extensions.timepicker.timepicker', array(
                    'model' => $model,
                    'name' => 'data',
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'timeFormat' => 'hh:mm',
                        'showOn' => 'focus',
                        'maxDate' => 'today',
                    ),
                ));
                ?>
                <?php echo $form->error($model, 'data'); ?>
            </div>
        </div>
    </div>
    <div id="descricaoNotaConsulta" class="row">

        <?php echo $form->textAreaControlGroup($model, 'descricao', array('size' => 6, 'maxlength' => 60)); ?>
        <?php echo $form->error($model, 'descricao'); ?>
    </div>





    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? 'Criar' : 'Guardar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>


    <?php $this->endWidget(); ?>

</div><!-- form -->
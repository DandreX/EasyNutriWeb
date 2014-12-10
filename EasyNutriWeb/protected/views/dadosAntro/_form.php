<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */
/* @var $form CActiveForm */
?>

<div id="formDadosAntro">


    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id' => 'dadosAntro_form',
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php $utentes = CHtml::listData(Utentes::model()->findAllByAttributes(
            array(),
            $condition = 'medico_id=:userid',
            $params = array(
                ':userid'=>Yii::app()->user->userid,
            )
        ), 'id', 'nome');
        echo $form->dropDownListControlGroup($model, 'utente_id', $utentes,
            array('empty' => 'Escolha o Utente', 'order' => 'nome'));?>
        <?php echo $form->error($model, 'user_id'); ?>
    </div>

    <div class="row">
        <?php $medicoes = CHtml::listData(TipoMedicao::model()->findAll(), 'id', 'descricao');
        echo $form->dropDownListControlGroup($model, 'tipo_medicao_id', $medicoes,
            array('empty' => 'Escolha o tipo de medicao', 'order' => 'descricao'));?>
        <?php echo $form->error($model, 'tipo_medicao_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->textFieldControlGroup($model, 'valor'); ?>
        <?php echo $form->error($model, 'valor'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'data_med', array('class' => 'control-label required')); ?>
        <?php
        $model->data_med = date('Y-m-d H:i');?>
        <div class="controls">
            <?php $form->widget('application.extensions.timepicker.timepicker', array(
                'model' => $model,
                'name' => 'data_med',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'timeFormat' => 'hh:mm',
                    'showOn' => 'focus',
                    'maxDate' => 'today',
                ),
            ));
            ?>
            <?php echo $form->error($model, 'data_med'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->textAreaControlGroup($model, 'observacoes', array('rows' => 4, 'cols' => 60)); ?>
        <?php echo $form->error($model, 'observacoes'); ?>
    </div>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->
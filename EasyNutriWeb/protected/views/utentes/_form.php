<?php
/* @var $this UtentesController */
/* @var $model Utentes */
/* @var $form CActiveForm */


$naoEditavel = $model->getScenario() == 'view';
?>

<div id="formUtentes">

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id' => 'utentes-form'
    )); ?>
    <?php if (!$naoEditavel): ?>
        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->errorSummary($model); ?>
    <?php endif; ?>


    <fieldset>
        <legend>Dados Pessoais</legend>
        <div class="row" id="formNomeUtente">
            <?php echo $form->textFieldControlGroup($model, 'nome', array('id' => 'textNome', 'size' => 60, 'maxlength' => 150, 'readonly' => $naoEditavel)); ?>
            <?php echo $form->error($model, 'nome'); ?>
        </div>

        <div class="row">
            <div class="control-group">
                <?php if (!$naoEditavel): ?>
                    <?php echo $form->label($model, 'data_nascimento', array('class' => 'control-label required')); ?>
                    <div class="controls">
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
                <?php else: ?>
                    <?php echo $form->textFieldControlGroup($model, 'data_nascimento', array('size' => 60, 'maxlength' => 150, 'readonly' => $naoEditavel)); ?>
                <?php endif ?>

            </div>
        </div>

        <div class="row">
            <?php echo $form->radioButtonListControlGroup($model, 'sexo', Utentes::model()->sexos, array('disabled'=>$naoEditavel)); ?>
            <?php echo $form->error($model, 'sexo'); ?>
        </div>


        <div class="row">
            <?php echo $form->textFieldControlGroup($model, 'profissao', array('size' => 60, 'maxlength' => 150, 'readonly' => $naoEditavel)); ?>
            <?php echo $form->error($model, 'profissao'); ?>
        </div>

        <div class="row">
            <?php echo $form->dropDownListControlGroup($model, 'estado_civil',
                array('Solteiro' => 'Solteiro', 'Casado' => 'Casado', 'Viuvo' => 'Viuvo', 'Divorciado' => 'Divorciado'),
                array('empty' => 'Escolha o estado civil', "disabled"=> $naoEditavel)); ?>
            <?php echo $form->error($model, 'estado_civil'); ?>
        </div>

        <div class="row">
            <?php echo $form->textFieldControlGroup($model, 'username', array('size' => 60, 'maxlength' => 128, 'readonly' => $naoEditavel)); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>
        <div class="row">
            <?php echo $form->textFieldControlGroup($model, 'nif', array('size' => 11, 'maxlength' => 11, 'readonly' => $naoEditavel)); ?>
            <?php echo $form->error($model, 'nif'); ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Contactos</legend>
        <div class="row">
            <?php echo $form->textAreaControlGroup($model, 'morada', array('rows' => 4, 'cols' => 60, 'readonly' => $naoEditavel)); ?>
            <?php echo $form->error($model, 'morada'); ?>
        </div>

        <div class="row">
            <?php echo $form->textFieldControlGroup($model, 'email', array('size' => 60, 'maxlength' => 150, 'readonly' => $naoEditavel)); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>

        <div class="row">
            <?php echo $form->textFieldControlGroup($model, 'telefone', array('size' => 30, 'maxlength' => 30, 'readonly' => $naoEditavel)); ?>
            <?php echo $form->error($model, 'telefone'); ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Dados Adicionais</legend>


        <div class="row">
            <?php echo $form->textAreaControlGroup($model, 'motivo_consulta', array('rows' => 4, 'cols' => 60, 'readonly' => $naoEditavel)); ?>
            <?php echo $form->error($model, 'motivo_consulta'); ?>
        </div>
    </fieldset>

    <?php if (!$naoEditavel): ?>
        <?php echo TbHtml::formActions(array(
            TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        )); ?>
    <?php endif; ?>

    <?php $this->endWidget(); ?>
</div>
<!-- form -->
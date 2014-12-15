<?php
/* @var $this FichaClinicaController */
/* @var $model FichaClinica */
/* @var $form CActiveForm */
?>

<div id="formFichaClinica">

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id' => 'utentes-form',
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <fieldset>
        <legend>Historial de Peso</legend>
        <div class="row">
            <?php echo $form->textFieldControlGroup($model,'peso_nascenca'); ?>
            <?php echo $form->error($model,'peso_nascenca'); ?>
        </div>

        <div class="row">
            <?php echo $form->textFieldControlGroup($model,'peso_minimo'); ?>
            <?php echo $form->error($model,'peso_minimo'); ?>
        </div>

        <div class="row">
            <?php echo $form->textFieldControlGroup($model,'peso_maximo'); ?>
            <?php echo $form->error($model,'peso_maximo'); ?>
        </div>

        <div class="row">
            <?php echo $form->textFieldControlGroup($model,'peso_habitual'); ?>
            <?php echo $form->error($model,'peso_habitual'); ?>
        </div>

        <div class="dadosFichaClinica">
            <?php echo $form->textAreaControlGroup($model,'tent_perda_peso',array('rows' => 6, 'cols' => 100)); ?>
            <?php echo $form->error($model,'tent_perda_peso'); ?>
        </div>
        <div class="dadosFichaClinica">
            <?php echo $form->textAreaControlGroup($model,'histPeso',array('rows' => 6, 'cols' => 100)); ?>
            <?php echo $form->error($model,'histPeso'); ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Antecedentes</legend>
        <div class="dadosFichaClinica">
            <?php echo $form->textAreaControlGroup($model,'antec_familiares',array('rows' => 6, 'cols' => 60)); ?>
            <?php echo $form->error($model,'antec_familiares'); ?>
        </div>

        <div class="dadosFichaClinica">
            <?php echo $form->textAreaControlGroup($model,'antec_pessoais',array('rows' => 6, 'cols' => 60)); ?>
            <?php echo $form->error($model,'antec_pessoais'); ?>
        </div>
    </fieldset>

        <div class="dadosFichaClinica">
            <?php echo $form->textAreaControlGroup($model,'patologias',array('rows' => 6, 'cols' => 60)); ?>
            <?php echo $form->error($model,'patologias'); ?>
        </div>

        <div class="dadosFichaClinica">
            <?php echo $form->textAreaControlGroup($model,'alergias_alim',array('rows' => 6, 'cols' => 60)); ?>
            <?php echo $form->error($model,'alergias_alim'); ?>
        </div>

        <div class="dadosFichaClinica">
            <?php echo $form->textAreaControlGroup($model,'intol_alim',array('rows' => 6, 'cols' => 60)); ?>
            <?php echo $form->error($model,'intol_alim'); ?>
        </div>

        <div class="dadosFichaClinica">
            <?php echo $form->textAreaControlGroup($model,'problem_digestao',array('rows' => 6, 'cols' => 60)); ?>
            <?php echo $form->error($model,'problem_digestao'); ?>
        </div>

        <div class="dadosFichaClinica">
            <?php echo $form->textAreaControlGroup($model,'transito_intestinal',array('rows' => 6, 'cols' => 60)); ?>
            <?php echo $form->error($model,'transito_intestinal'); ?>
        </div>

        <div class="dadosFichaClinica">
            <?php echo $form->textAreaControlGroup($model,'habitos_toxicos',array('rows' => 6, 'cols' => 60)); ?>
            <?php echo $form->error($model,'habitos_toxicos'); ?>
        </div>

        <div class="dadosFichaClinica">
            <?php echo $form->textAreaControlGroup($model,'medic_suplem_alim',array('rows' => 6, 'cols' => 60)); ?>
            <?php echo $form->error($model,'medic_suplem_alim'); ?>
        </div>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>


    <?php $this->endWidget(); ?>

</div><!-- form -->
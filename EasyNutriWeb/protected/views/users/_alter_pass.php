<?php

?>

<h3><?php echo $model->nome ?></h3>
<?php if($alterada): ?>
    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, 'Password alterada com sucesso'); ?>
<?php endif; ?>

<div id="formAlterarPass">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id' => 'alterPass_form',
    )); ?>
<fieldset>
    <legend>Alterar Password</legend>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <div class="row">
            <?php echo $form->passwordFieldControlGroup($model, 'passAntiga', array('type'=>'password')); ?>
    </div>

    <div class="row">
        <?php echo $form->passwordFieldControlGroup($model, 'novaPass'); ?>
    </div>

    <div class="row">
        <?php echo $form->passwordFieldControlGroup($model, 'passConfirmacao'); ?>
    </div>
</fieldset>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton('Alterar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>

    <?php $this->endWidget(); ?>







</div>
<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentares */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'planos-alimentares-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_utente'); ?>
		<?php echo $form->textField($model,'id_utente'); ?>
		<?php echo $form->error($model,'id_utente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_medico'); ?>
		<?php echo $form->textField($model,'id_medico'); ?>
		<?php echo $form->error($model,'id_medico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_presc'); ?>
		<?php echo $form->textField($model,'data_presc'); ?>
		<?php echo $form->error($model,'data_presc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ned'); ?>
		<?php echo $form->textField($model,'ned'); ?>
		<?php echo $form->error($model,'ned'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
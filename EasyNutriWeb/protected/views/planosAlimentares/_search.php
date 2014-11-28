<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentares */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_utente'); ?>
		<?php echo $form->textField($model,'id_utente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_medico'); ?>
		<?php echo $form->textField($model,'id_medico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_presc'); ?>
		<?php echo $form->textField($model,'data_presc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ned'); ?>
		<?php echo $form->textField($model,'ned'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<?php
/* @var $this HabitosAlimentaresController */
/* @var $model HabitosAlimentares */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora_local_comp_ref'); ?>
		<?php echo $form->textField($model,'hora_local_comp_ref',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'metod_culin_comum'); ?>
		<?php echo $form->textField($model,'metod_culin_comum',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ing_doce_alim_gordo'); ?>
		<?php echo $form->textField($model,'ing_doce_alim_gordo',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ing_hidrica_diaria'); ?>
		<?php echo $form->textField($model,'ing_hidrica_diaria',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activ_fisica'); ?>
		<?php echo $form->textField($model,'activ_fisica',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idUtente'); ?>
		<?php echo $form->textField($model,'idUtente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
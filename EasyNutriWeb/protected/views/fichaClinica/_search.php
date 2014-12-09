<?php
/* @var $this FichaClinicaController */
/* @var $model FichaClinica */
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
		<?php echo $form->label($model,'peso_nascenca'); ?>
		<?php echo $form->textField($model,'peso_nascenca'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'peso_minimo'); ?>
		<?php echo $form->textField($model,'peso_minimo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'peso_maximo'); ?>
		<?php echo $form->textField($model,'peso_maximo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'peso_habitual'); ?>
		<?php echo $form->textField($model,'peso_habitual'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tent_perda_peso'); ?>
		<?php echo $form->textField($model,'tent_perda_peso',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'antec_familiares'); ?>
		<?php echo $form->textField($model,'antec_familiares',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'antec_pessoais'); ?>
		<?php echo $form->textField($model,'antec_pessoais',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'patologias'); ?>
		<?php echo $form->textField($model,'patologias',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alergias_alim'); ?>
		<?php echo $form->textField($model,'alergias_alim',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'intol_alim'); ?>
		<?php echo $form->textField($model,'intol_alim',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'problem_digestao'); ?>
		<?php echo $form->textField($model,'problem_digestao',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transito_intestinal'); ?>
		<?php echo $form->textField($model,'transito_intestinal',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'habitos_toxicos'); ?>
		<?php echo $form->textField($model,'habitos_toxicos',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'medic_suplem_alim'); ?>
		<?php echo $form->textField($model,'medic_suplem_alim',array('size'=>-1,'maxlength'=>-1)); ?>
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
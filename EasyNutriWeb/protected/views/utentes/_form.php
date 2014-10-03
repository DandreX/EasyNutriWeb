<?php
/* @var $this UtentesController */
/* @var $model Utentes */
/* @var $usersModel Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'utentes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>



    <div class="row">
        <?php echo $form->labelEx($usersModel, 'nome'); ?>
        <?php echo $form->textField($usersModel, 'nome', array('size' => 60, 'maxlength' => 150)); ?>
        <?php echo $form->error($usersModel, 'nome'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($usersModel, 'username'); ?>
        <?php echo $form->textField($usersModel, 'username', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($usersModel, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($usersModel, 'password'); ?>
        <?php echo $form->passwordField($usersModel, 'password', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($usersModel, 'password'); ?>
    </div>


    <!--FIM DO FORM USERS -->

<!--    <div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'id'); ?>
<!--		--><?php //echo $form->textField($model,'id'); ?>
<!--		--><?php //echo $form->error($model,'id'); ?>
<!--	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'morada'); ?>
		<?php echo $form->textField($model,'morada',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'morada'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>



<div class="form_login">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id' => 'login-form'
    )); ?>
 <br>
    <br>
    <?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->textFieldControlGroup($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->passwordFieldControlGroup($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBoxControlGroup($model,'rememberMe'); ?>
	</div>

<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton('Login',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
<!--	</div>-->

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton('Login', array('id'=>'btnLogin', 'color' => TbHtml::BUTTON_COLOR_DEFAULT )),
    )); ?>

<?php $this->endWidget(); ?>
</div><!-- form -->

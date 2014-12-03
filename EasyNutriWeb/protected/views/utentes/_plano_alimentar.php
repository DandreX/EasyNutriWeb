<?php
/* var $model Utente*/
?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_INLINE,
    'action'=>Yii::app()->createUrl("planosalimentares/create"),
)); ?>
<input type="hidden" name="utenteId" value="<?php echo($model->id)?>">

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Novo plano alimentar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
)); ?>

<?php $this->endWidget(); ?>

<p>Este utente ainda não tem nenhum plano alimentar</p>
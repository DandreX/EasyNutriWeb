<?php
/* @var $model Utente */
/* @var $modelFichaClinica FichaClinica */
?>


<?php if ($modelFichaClinica): ?>

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_INLINE,
        'action' => Yii::app()->createUrl("fichaClinica/update&id=" . $modelFichaClinica->id),
    ));
    ?>
    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Editar Ficha Clinica', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>
    <?php $this->endWidget(); ?>
    <?php
    $this->renderPartial('_form_ficha_clinica', array('model' => $modelFichaClinica));
    ?>

<?php else: ?>

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_INLINE,
        'action' => Yii::app()->createUrl("fichaClinica/create&idUtente=" . $model->id),
    ));
    ?>

    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Nova Ficha Clinica', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>


    <?php $this->endWidget(); ?>
    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_DEFAULT, 'Este utente ainda não possui ficha clínica.'); ?>
<?php endif ?>

<script type="text/javascript">
    $('.form-actions').addClass('btnFormsViewUtentes');
    $('.form-actions').removeClass('form-actions');
</script>
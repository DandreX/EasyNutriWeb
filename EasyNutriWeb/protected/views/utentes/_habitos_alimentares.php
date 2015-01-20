
<?php
/* @var $model Utente */
/* @var $modelHabitosAlimentares HabitosAlimentares */
?>

<?php if ($modelHabitosAlimentares): ?>

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_INLINE,
        'action' => Yii::app()->createUrl("habitosAlimentares/update&id=" . $modelHabitosAlimentares->id),
    ));
    ?>
    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Editar Hábitos Alimentares'
        ))); ?>
    <?php $this->endWidget(); ?>
    <?php
    $this->renderPartial('_form_habitos_alimentares', array('model' => $modelHabitosAlimentares));
    ?>

<?php else: ?>

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_INLINE,
        'action' => Yii::app()->createUrl("habitosAlimentares/create&idUtente=" . $model->id),
    ));
    ?>

    <?php
    echo TbHtml::formActions(array(
        TbHtml::submitButton('Novos Hábitos Alimentares', array('icon'=>'plus')),
    )); ?>


    <?php $this->endWidget(); ?>
    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_DEFAULT, 'Este utente ainda não possui hábitos alimentares.'); ?>
<?php endif ?>

<script type="text/javascript">
    $('.form-actions').addClass('btnFormsViewUtentes');
    $('.form-actions').removeClass('form-actions');
</script>
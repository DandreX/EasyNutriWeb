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


<?php if(count($model->planosAlimentares)==0): ?>
    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_DEFAULT, 'Este utente ainda não tem nenhum plano alimentar.'); ?>
<?php else: ?>
   <div id="planoAlimentar"></div>
<?php endif ?>


<script type="text/javascript">
    $('.form-actions').addClass('btnFormsViewUtentes');
    $('.form-actions').removeClass('form-actions');

    $(document).ready(function(){
        var temPlano = <?php echo count($model->planosAlimentares)?>;
        console.log(temPlano);
        if(temPlano > 0){
            $.ajax({
                type: 'GET',
                url: '<?php echo Yii::app()->createAbsoluteUrl("planosAlimentares/ultimoPlano&idUtente=".$model->id)?>',
                success: function (data) {
                    $('#planoAlimentar').html(data);
                },
                error: function (data) { // if error occured
                    alert("Ocorreu um erro a obter plano alimentar");
                },
                dataType: 'html'
            });
        }
    });
</script>


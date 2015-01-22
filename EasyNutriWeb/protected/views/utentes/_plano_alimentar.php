<?php
/* var $model Utente*/

?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_INLINE,
    'action' => Yii::app()->createUrl("planosalimentares/create"),
)); ?>
<input type="hidden" name="utenteId" value="<?php echo($model->id) ?>">

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Novo plano alimentar', array('icon' => 'plus')),
)); ?>

<?php $this->endWidget(); ?>


<?php if (count($model->planosAlimentares) == 0): ?>
    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_DEFAULT, 'Este utente ainda não tem nenhum plano alimentar.'); ?>
<?php else: ?>
    <div id="planoAlimentar"></div>
    <div id="spinner_planoAlimentar"></div>
<?php endif ?>


<script type="text/javascript">
    $('.form-actions').addClass('btnFormsViewUtentes');
    $('.form-actions').removeClass('form-actions');

    $(document).ready(function () {
        var temPlano = <?php echo count($model->planosAlimentares)?>;
        mostrarSpinner('spinner_planoAlimentar');
        if (temPlano > 0) {
            $.ajax({
                type: 'GET',
                url: '<?php echo Yii::app()->createAbsoluteUrl("planosAlimentares/ultimoPlano&idUtente=".$model->id)?>',
                success: function (data) {
                    $('#planoAlimentar').html(data);
                    $('#print-div').html(data);
                    $('#print-div').prepend('<h1>Plano alimentar de <?php echo $model->nome ?></h1><br/>')
                    esconderSpinner('spinner_planoAlimentar');
                },
                error: function (data) { // if error occured
                    alert("Ocorreu um erro a obter plano alimentar");
                    esconderSpinner('spinner_planoAlimentar');
                },
                dataType: 'html'
            });
        }


//        $('#btnImprimir').click(function () {
//            console.log('imprpimir');
//            window.print();
//        });

    });
</script>


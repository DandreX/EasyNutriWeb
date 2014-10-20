<?php
/* @var $model Utente */
/* @var $modelDiarioAlimentar DiarioAlimentar */
/*@var $data array*/
?>


<h5>Data</h5>


<?php

//echo TbHtml::textField('date', '', array('placeholder' => 'Data'));
?>
<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'diarioAlimentar',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'onsubmit' => "return false;", /* Disable normal form submit */
            'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
        ),
    )); ?>

    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'attribute' => '$modelDiarioAlimentar->data_diario',
    'name' => 'DiarioAlimentar[data_diario]',
    'value' => date('Y-m-d'),
    'language' => 'pt',
    'options' => array(
        'showAnim' => 'fold',
        'dateFormat' => 'yy-mm-dd',
        'changeYear' => 'true',
        'changeMonth' => 'true',
        'maxDate' => 'today',
    ),
));
?>
    <div class="row buttons">
        <?php echo CHtml::Button('Pesquisar', array('onclick' => 'requestRefeicoes();')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>

<div id="refeicoes"></div>

<div id="detalhes_refeicao"></div>


<script type="text/javascript">
    function requestRefeicoes() {
        var data = $("#diarioAlimentar").serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("utentes/AjaxRefeicoes&id=".$model->id); ?>',
            data: data,
            success: function (data) {
                $('#refeicoes').html(data);
            },
            error: function (data) { // if error occured
                alert("Não foram encontradas refeições para a data selecionada");
            },
            dataType: 'html'
        });
    }
</script>




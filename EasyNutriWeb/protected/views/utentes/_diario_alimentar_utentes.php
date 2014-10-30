<?php
/* @var $model Utente */
/* @var $refeicoes Refeicoes */
/*@var $data array*/
?>
<?php
$dataPesquisa = date('Y-m-d');
global $funciona;
$funciona = 1;
?>

Diario alimentar:
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
//    'attribute' => 'dataPesquisa',
    'name' => 'data_pesquisa',
    'value' => $dataPesquisa,
    'language' => 'pt',
    'options' => array(
        'showAnim' => 'fold',
        'dateFormat' => 'yy-mm-dd',
        'changeYear' => 'true',
        'changeMonth' => 'true',
        'maxDate' => 'today',
    ),
    // 'onEmpty'=>'sem resultados'
));
?>


<div id="refeicoes"></div>

<div id="detalhes_refeicao"></div>



<?php echo TbHtml::button('Enviar notificação', array(
    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
    'size' => TbHtml::BUTTON_SIZE_DEFAULT,
    'data-toggle' => 'modal',
    'data-target' => '#ModalNotificacao',
)); ?>
<?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'ModalNotificacao',
    'header' => 'Nova Notificação',
    'content' => '',
    'footer' => array(
        TbHtml::button('Enviar Notificação',
            array('id' => 'btnCreate',
                'data-dismiss' => 'modal',
                'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Cancelar', array(
            'id'=>'btnCancelar',
            'color'=>TbHtml::BUTTON_COLOR_DANGER,
            'data-dismiss' => 'modal')),
    ),
)); ?>
<script type="text/javascript" id="modalButtons">
    $('#btnCreate').click(function () {
        var data=$("#notificacoes-form").serialize()+'&idUtente='+'<?php echo($model->id) ?>';
        console.log(data);
        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("notificacoes/AjaxCreate"); ?>',
            data:data,
            success: function (data) {
              alert("Notificação enviada com sucesso");
            },
            error: function (data) { // if error occured
                alert("Erro ao enviar notificacao");
            },
            dataType: 'html'
        });
    });
    $('#btnCancelar').click(function(){
        $('#Notificacoes_assunto').val('');
        $('#Notificacoes_descricao').val('');
    });
</script>

<script type="text/javascript" id="loadNotificacaoLayout">
    $.ajax({
        type: 'GET',
        url: '<?php echo Yii::app()->createAbsoluteUrl("notificacoes/AjaxCreate"); ?>',
        success: function (data) {
            $('.modal-body').html(data);
        },
        error: function (data) { // if error occured
            alert("Ocorreu um erro");
        },
        dataType: 'html'
    });

</script>

<script type="text/javascript" id="ajaxRefeicoes">

    var funciona = true;
    var requestRefeicoes = function () {

        var dataPesquisa = $("#data_pesquisa").val();
        console.log("request made");
        $.ajax({
            type: 'GET',
            url: '<?php echo Yii::app()->createAbsoluteUrl("refeicoes/AjaxRefeicoes&idUtente=$model->id&data="); ?>' + dataPesquisa,
            success: function (data) {
                $('#refeicoes').html(data);
                $('#detalhes_refeicao').empty();
            },
            error: function (data) { // if error occured
                alert("Ocorreu um erro a obter refeicao");
            },
            dataType: 'html'
        });
            }
    $(document).ready(requestRefeicoes);
    funciona=false;
    $("#data_pesquisa").change(function () {
        requestRefeicoes();
        if(!funciona){
            requestRefeicoes();
        }

    });
</script>






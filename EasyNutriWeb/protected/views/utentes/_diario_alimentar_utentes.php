<?php
/* @var $model Utente */
/* @var $refeicoes Refeicoes */
/* @var $datasDiario array*/
?>
<?php
$dataPesquisa = date('Y-m-d');
?>

<h4>Diário alimentar do dia</h4>

<?php echo TbHtml::button('', array('class'=>'btnRefresh', 'icon' => 'refresh', 'onclick'=>'btnRefreshDiarioAlim();')); ?>

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
        'beforeShowDay'=>'js:highlightDays'
    ),
    // 'onEmpty'=>'sem resultados'
));
?>

<div id="spinner_place"></div>
<div id="refeicoes"></div>



<script type="text/javascript" id="modalButtons">
    $('#btnCreate').click(function () {
        var data = $("#notificacoes-form").serialize() + '&idUtente=' + '<?php echo($model->id) ?>';
        console.log(data);
        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("notificacoes/AjaxCreate"); ?>',
            data: data,
            success: function (data) {
                alert("Notificação enviada com sucesso");
            },
            error: function (data) { // if error occured
                alert("Erro ao enviar notificacao");
            },
            dataType: 'html'
        });
    });
    $('#btnCancelar').click(function () {
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

    var semaforo = true;
    var requestRefeicoes = function () {
        var spinner = "\x3Cdiv class=\"spinner\"\x3E\n \x3Cdiv class=\"rect1\"\x3E\x3C\x2Fdiv\x3E\n \x3Cdiv class=\"rect2\"\x3E\x3C\x2Fdiv\x3E\n \x3Cdiv class=\"rect3\"\x3E\x3C\x2Fdiv\x3E\n \x3Cdiv class=\"rect4\"\x3E\x3C\x2Fdiv\x3E\n \x3Cdiv class=\"rect5\"\x3E\x3C\x2Fdiv\x3E\n\x3C\x2Fdiv\x3E";
        $('#spinner_place').html(spinner);
        $('#refeicoes').empty();
        var dataPesquisa = $("#data_pesquisa").val();
        console.log("request made");
        $.ajax({
            type: 'GET',
            url: '<?php echo Yii::app()->createAbsoluteUrl("refeicoes/AjaxRefeicoes&idUtente=$model->id&data="); ?>' + dataPesquisa,
            success: function (data) {
                $('#refeicoes').html(data);
                $('#spinner_place').empty();
            },
            error: function (data) { // if error occured
                alert("Ocorreu um erro a obter refeicao");
                $('#spinner_place').empty();
            },
            dataType: 'html'
        });
    }
    $(document).ready(requestRefeicoes);
    semaforo = false;
    $("#data_pesquisa").change(function () {
        requestRefeicoes();
        if (!semaforo) {
            requestRefeicoes();
        }
    });

    var freeDays = '<?php echo  $datasDiario; ?>';
    freeDays = JSON.parse(freeDays);

    // runs for every day displayed in datepicker, adds class and tooltip if matched to days in freeDays array
    function highlightDays(date) {

        for (i in freeDays) {
            if (new Date(freeDays[i]).toString() == date.toString()) {
                return [true, 'free-day', 'no to-do items due']; // [0] = true | false if this day is selectable, [1] = class to add, [2] = tooltip to display
            }
        }

        return [true, ''];
    }


    function btnRefreshDiarioAlim(){
        window.location = '<?php Yii::app()->getRequest()->getURL(); ?>'+"#tab_3";
        window.location.reload();
    }
</script>








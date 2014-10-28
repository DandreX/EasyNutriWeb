<?php
/* @var $model Utente */
/* @var $refeicoes Refeicoes */
/*@var $data array*/
?>
<?php
$dataPesquisa= date('Y-m-d');
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
  //  'layout' => TbHtml::FORM_LAYOUTHORIZONTAL,
));?>

<?php $form->labelEx($model,'Data:'); ?>


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

<?php $this->endWidget()?>

<div id="refeicoes"></div>

<div id="detalhes_refeicao"></div>

<script type="text/javascript" id="ajaxRefeicoes">
   var requestRefeicoes = function() {
       var dataPesquisa= $("#data_pesquisa").val();
       $.ajax({
           type: 'GET',
           url: '<?php echo Yii::app()->createAbsoluteUrl("refeicoes/AjaxRefeicoes&idUtente=$model->id&data="); ?>'+ dataPesquisa,
           success: function (data) {
               $('#refeicoes').html(data);
           },
           error: function (data) { // if error occured
               alert("Ocorreu um erro a obter refeicao");
           },
           dataType: 'html'
       });
   }
   $( document ).ready(requestRefeicoes);
   $("#data_pesquisa").change(requestRefeicoes);
</script>

<script type="text/javascript">
    $("#tabela_refeicoes").mouseup(function () {
        setTimeout(function () {
            var idRefeicao = $('#tabela_refeicoes .selected > td:first-child').text();
            if (idRefeicao == "") {
                idRefeicao = -1;
            }
            $.ajax({
                type: 'GET',
                url: '<?php echo Yii::app()->createAbsoluteUrl("utentes/AjaxDetalhesRefeicao&id="); ?>' + idRefeicao,
                success: function (data) {
                    $('#detalhes_refeicao').html(data);
                },
                error: function (data) { // if error occured
                    alert("Ocorreu um erro ao obter detalhes da refeicao");
                },
                dataType: 'html'
            });

        }, 20)
    });
</script>





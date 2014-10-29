<?php
/* @var $model Utente */
/* @var $refeicoes Refeicoes */
/*@var $data array*/
?>
<?php
$dataPesquisa= date('Y-m-d');
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
   $("#data_pesquisa").change(function(){
       requestRefeicoes();
       console.log("request made");
   });
</script>






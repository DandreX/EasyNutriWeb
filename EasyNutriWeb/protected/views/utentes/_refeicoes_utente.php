<?php
/*var $dataProviderRefeicoes CActiveDataProvider*/
?>
<div id="refeicoes">
    <?php  $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'tabela_refeicoes',
        'dataProvider' => $dataProvider,
        'template' => "{items}",
        'selectableRows' => 1,
        'htmlOptions' => array('id' => 'tabela_refeicoes'),
        'columns' => array(
            array('value' => '$data->id',
                'header' => 'ID',
            ),
            array(
                'value' => '$data->tipoRefeicao->descricao',
                'header' => 'Refeição',
            ),
            array(
                'name' => 'data_refeicao',
                'header' => 'Data / Hora',
            ),
            array(
                'class' => 'CCheckBoxColumn',
            ),

        ),

    ));
    ?>

</div>

<script type="text/javascript">
    $("#tabela_refeicoes").mouseup(function () {
        setTimeout(function () {
            var idRefeicao = $('#tabela_refeicoes .selected > td:first-child').text();
            if (idRefeicao !== 'undefined') {
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
            }
        }, 50)
    });
</script>
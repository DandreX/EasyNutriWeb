<?php
/*var $dataProvider CActiveDataProvider*/
?>
<div id="refeicoes">
    <?php  $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'tabela_refeicoes',
        'dataProvider' => $dataProvider,
        'template' => "{items}",
        'selectableRows' => 1,
        'htmlOptions' => array('id' => 'tabela_refeicoes'),
        'columns' => array(
            array('value' => '$data->tipoRefeicao->id',
                'header' => 'ID',
                'header' => '',
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
    function requestDetalhes($id) {

        var $idRefeicao = $id;
        $.ajax({
            type: 'GET',
            url: '<?php echo Yii::app()->createAbsoluteUrl("utentes/AjaxDetalhesRefeicao&id="); ?>' + $idRefeicao,
            success: function (data) {
                $('#detalhes_refeicao').html(data);
            },
            error: function (data) { // if error occured
                alert("Ocorreu um erro ao obter detalhes da refeicao");
            },
            dataType: 'html'
        });
    }

</script>

<script type="text/javascript">
    $("#tabela_refeicoes").click(function () {
        var selected = $('#tabela_refeicoes').yiiGridView('getChecked');
        console.log(selected);
        $this = $(this);
        var colVal = $this.find('td:first-child').text();
        alert(selected[0]);

        requestDetalhes(colVal);
    });
</script>
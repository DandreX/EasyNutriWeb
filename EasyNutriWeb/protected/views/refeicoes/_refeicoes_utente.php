<?php

/*@var $dpsRefeicoes Dataprovider[] com refeicoes*/
/*@var $dpTotalDiario Dataprovider com totaisdiarios*/
?>
<h4>Totais consumidos</h4>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tabela_total_diario',
    'type' => TbHtml::GRID_TYPE_STRIPED,
    'dataProvider' => $dpTotalDiario,
    'selectableRows' => 1,
    'enableSorting' => false,
    'showTableOnEmpty' => false,
    'emptyText' => 'Não disponiveis',
    'summaryText' => '',
    'columns' => array(
        array(
            'name' => 'calorias',
            'header' => 'Energia (Kcal)',
        ),
        array(
            'name' => 'agua',
            'header' => 'Água (g)',
        ),
        array(
            'name' => 'proteinas',
            'header' => 'Proteínas (g)',
        ),
        array(
            'name' => 'lipidos',
            'header' => 'Lípidos (g)',
        ),
        array(
            'name' => 'hidratos_carbono',
            'header' => 'Hidratos de Carbono (g)'
        ),
        array(
            'name' => 'acucares',
            'header' => 'Açúcares (g)',
        ),


        array(
            'name' => 'fibras',
            'header' => 'Fibras (g)',
        ),


    )


));
?>
<h4>Descrição</h4>

<?php

$this->widget('ext.groupgridview.BootGroupGridView', array(
    'id' => 'tabela_refeicoes',
    'type' => TbHtml::GRID_TYPE_BORDERED,
    'extraRowColumns' => array('tipo_refeicao'),
    'extraRowPos' => 'above',
    'mergeColumns' => array('hora'),
    'dataProvider' => $dpsRefeicoes,
    'selectableRows' => 1,
    'enableSorting' => false,
    'emptyText' => 'Não existem refeicoes para este dia',
    'showTableOnEmpty' => false,
    'columns' => array(

        array(
            'value' => '$data->hora',
            'header' => 'Hora',
        ),
        array(
            'value' => '$data->nome',
            'header' => 'Alimento',
        ),
        array(
            'value' => '$data->quant',
            'header' => 'Quantidade',
        ),
        array(
            'name' => 'porcao',
            'header' => 'Porção',
        ),
        array(
            'name' => 'calorias',
            'header' => 'Energia (Kcal)',
        ),
        array(
            'name' => 'agua',
            'header' => 'Água (g)',
        ),
        array(
            'name' => 'proteinas',
            'header' => 'Proteínas (g)',
        ),
        array(
            'name' => 'lipidos',
            'header' => 'Lípidos (g)',
        ),
        array(
            'name' => 'hidratos_carbono',
            'header' => 'Hidratos de Carbono (g)'
        ),
        array(
            'name' => 'acucares',
            'header' => 'Açúcares (g)',
        ),


        array(
            'name' => 'fibras',
            'header' => 'Fibras (g)',
        ),
    ),

));?>

<script type="text/javascript">
    $("#tabela_refeicoes").mouseup(function () {
        setTimeout(function () {
            var refeicao = $('#tabela_refeicoes .selected  .extrarow ').text();
            var data = $('#data_pesquisa').val();
            var assunto = (refeicao != "") ? refeicao + ", " + data : "";
            $("#Notificacoes_assunto").val(assunto);
        }, 20)
    });
</script>









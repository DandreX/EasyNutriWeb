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
            'header' => 'Hidratos Carbono (g)'
        ),
        array(
            'name' => 'acucares',
            'header' => 'Açucares (g)',
        ),


        array(
            'name' => 'fibras',
            'header' => 'Fibras (g)',
        ),


    )


));
?>
<h4>Refeicoes</h4>

<?php

$this->widget('ext.groupgridview.BootGroupGridView', array(
    'id' => 'tabela_refeicoes',
    'type' => TbHtml::GRID_TYPE_BORDERED,
    'mergeColumns' => array('hora'),
    'extraRowColumns' => array('tipo_refeicao'),
    'extraRowPos' => 'above',
    'dataProvider' => $dpsRefeicoes,
    'selectableRows' => 1,
    'enableSorting' => false,
    'emptyText' => 'Não existem refeicoes para este dia',
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
            'header' => 'Quantidade (100g)',
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
            'header' => 'Hidratos Carbono (g)'
        ),
        array(
            'name' => 'acucares',
            'header' => 'Açucares (g)',
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









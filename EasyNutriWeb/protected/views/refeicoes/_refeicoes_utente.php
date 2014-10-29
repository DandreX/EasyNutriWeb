<?php

/*@var $dataprovider Dataprovider com refeicoes*/
/*@var $dpTotalDiario Dataprovider com totaisdiarios*/
?>
<h4>Totais consumidos</h4>
<?php
if ($dpTotalDiario) {
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'tabela_total_diario',
        'type' => TbHtml::GRID_TYPE_STRIPED,
        'dataProvider' => $dpTotalDiario,
        'selectableRows'=>1,
        'enableSorting'=>false,
        'showTableOnEmpty'=>false,
        'emptyText'=>'Não disponiveis',
        'columns'=>array(
            array(
                'name'=>'hidratos_carbono',
                'header'=>'Hidratos Carbono (g)'
            ),
            array(
                'name'=>'acucares',
                'header'=>'Açucares (g)',
            ),
            array(
                'name'=>'proteinas',
                'header'=>'Proteínas (g)',
            ),
            array(
                'name'=>'lipidos',
                'header'=>'Lípidos (g)',
            ),
            array(
                'name'=>'fibras',
                'header'=>'Fibras (g)',
            ),
            array(
                'name'=>'agua',
                'header'=>'Água (g)',
            ),
            array(
                'name'=>'calorias',
                'header'=>'Calorias (Kcal)',
            ),
        )


    ));

}?>
<h4>Refeições</h4>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tabela_refeicoes',
    'type' => TbHtml::GRID_TYPE_STRIPED,
    'dataProvider' => $dataProvider,
//                'filter'=> $dataProvider,
  //  'template' => "{items}",
    'selectableRows'=>1,
    'enableSorting'=>false,
   // 'htmlOptions' => array('id' => 'tabela_refeicoes'),
    'emptyText'=>'Não existem refeicoes para este dia',
    'columns' => array(
        array(
            'name'=>'id',
            'value' => '$data->id',
            'header' => 'ID',
            'htmlOptions' => array('color' =>'width: 60px'),
        ),
        array(
            'name'=>'tipo_refeicao',
            'value' => '$data->tipoRefeicao->descricao',
            'header' => 'Refeição',
        ),
        array(
            'name' => 'data_refeicao',
            'value' => '$data->data_refeicao',
            'header' => 'Data / Hora',
        ),
        array(
//            'name' => 'selectedRow',
            'header' => ' ',
            'class' => 'CCheckBoxColumn',

        ),

    ),

));
?>





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






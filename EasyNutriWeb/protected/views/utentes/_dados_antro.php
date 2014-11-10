<?php
/* var $dpDadosAntro CActiveDataProvider VResumosAntro*/
$pesos = $graficos['peso'];
$massa = $graficos['massa'];
?>

<?php $this->widget('ext.groupgridview.BootGroupGridView', array(
    'id' => 'dados-antro-grid',
    'type' => TbHtml::GRID_TYPE_BORDERED,
    'dataProvider' => $dpDadosAntro,
    'template' => '{items}{pager}',
    'extraRowColumns' => array('medicao'),
    'extraRowPos' => 'above',
    'enableSorting' => false,
    'emptyText' => 'Não existem dados para este utente',
    'columns' => array(
//        array(
//            'name' => 'tipoMedicaoSearch',
//            'value' => '$data->tipoMedicao ? $data->tipoMedicao->descricao: "-"'
//        ),
        array(
            'name'=>'valor',
            'value'=>'number_format($data->valor, 2)',
        ),
        'data',
        'local'
    ),

)); ?>
<div style="width:100%;margin: 0 auto">
<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
    'id'=>'grafico_peso',
    'options' => array(
        'chart' => array(
//            'width'=>850,
            'borderWidth'=>2,
            'borderColor'=>'#c3d9ff',
        ),
        'title' => array('text' => 'Histórico de Pesagens'),
        'xAxis' => array(
            'type'=>'datetime',
            'title' => array('text' => 'Tempo'),
        ),
        'yAxis' => array(
            'title' => array('text' => 'Pesos (Kg)'),
            'floor' => 0,
        ),
        'tooltip' => array(
            'pointFormat'=>'{point.x:%e. %b}: {point.y:.1f} kg',
        ),
        'series' => array(
            array(
                'name' => 'Na consulta',
                'data' => $pesos['valoresConsulta']
            ),
           array(
               'name' => 'Em casa',
               'data'=>$pesos['valoresCasa']
           ),
        ),
    )
));?>
</div>

<div >
<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
    'id'=>'grafico_massa',
    'options' => array(
        'chart' => array(
            'borderWidth'=>2,
            'borderColor'=>'#c3d9ff',
//            'marginBottom'=>5,

        ),
        'title' => array('text' => 'Histórico de Massa Gorda'),
        'xAxis' => array(
            'type'=>'datetime',
            'title' => array('text' => 'Tempo'),
        ),
        'yAxis' => array(
            'title' => array('text' => 'Massa Gorda (%)'),
            'floor' => 0,
        ),
        'series' => array(
            array(
                'name' => 'Em casa',
                'data'=>$massa['valores'],
            ),

        ),
    )
));?>
</div>
<!--<script type="text/javascript">-->
<!--    $( document ).ready(function() {-->
<!--        console.log( "ready!" );-->
<!--    });-->
<!--</script>-->
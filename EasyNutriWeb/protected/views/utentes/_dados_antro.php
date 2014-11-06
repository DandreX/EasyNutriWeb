<?php
/* var $dpDadosAntro CActiveDataProvider*/
$pesos = $graficos['peso'];
$massa = $graficos['massa'];
?>

<?php $this->widget('ext.groupgridview.BootGroupGridView', array(
    'id' => 'dados-antro-grid',
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

        'valor',
        'data_med',
        'local'
    ),

)); ?>

<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
    'id'=>'grafico_peso',
    'options' => array(
        'chart' => array(
            'width'=>850,
            'borderWidth'=>2,
            'borderColor'=>'#c3d9ff',
//            'marginBottom'=>5,
        ),
        'title' => array('text' => 'Histórico de Pesagens'),
        'xAxis' => array(
            'title' => array('text' => 'Datas'),
            'categories' => $pesos['datas'],
        ),
        'yAxis' => array(
            'title' => array('text' => 'Pesos (Kg)'),
            'floor' => 0,
        ),
        'series' => array(
            array('name' => 'Na consulta', 'data' => $pesos['kgConsulta']),
            array('name' => 'Em casa', 'data'=>$pesos['kgEmCasa']),
            //   array('name' => 'Em casa', 'data' => array(5, 7, 3))
        ),
    )
));?>

<?php $this->Widget('ext.highcharts.HighchartsWidget', array(
    'id'=>'grafico_massa',
    'options' => array(
        'chart' => array(
            'width'=>850,
            'borderWidth'=>2,
            'borderColor'=>'#c3d9ff',
//            'marginBottom'=>5,

        ),
        'title' => array('text' => 'Histórico de Massa Gorda'),
        'xAxis' => array(
            'title' => array('text' => 'Datas'),
            'categories' => $massa['datas'],
        ),
        'yAxis' => array(
            'title' => array('text' => 'Massa Gorda (%)'),
            'floor' => 0,
        ),
        'series' => array(
            array('name' => '',
                'data' => $massa['massa'],
                'showInLegend'=> false,
            ),

        ),
    )
));?>
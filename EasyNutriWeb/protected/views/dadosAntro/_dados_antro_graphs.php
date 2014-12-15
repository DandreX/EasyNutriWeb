<?php
/* @var $graficos array*/
/* @var $modelUtente Utentes */


$pesos = $graficos['peso'];
$massa = $graficos['massa'];
?>

<div>
    <!--<h4>Histórico de Pesagens</h4>-->
    <?php if ($pesos['valoresConsulta'] != null || $pesos['valoresCasa'] != null)
        $this->Widget('ext.highcharts.HighchartsWidget',
            array(
                'id' => 'grafico_peso',
                'options' => array(
                    'chart' => array(
                        'borderWidth' => 2,
                        'borderColor' => '#c3d9ff',
                        'zoomType' => 'x',
                    ),
                    'title' => array('text' => 'Histórico de Pesagens'),
                    'subtitle'=>array(
                        "text"=>CHtml::link("Ver tabela de pesos",
                            Yii::app()->createUrl('dadosAntro/admin',array(
                                "DadosAntro[nomeUtenteSearch]"=>$modelUtente->nome,
                                "DadosAntro[tipoMedicaoSearch]"=>"peso"
                            ))),
                        "useHTML"=>true,
                    ),
                    'xAxis' => array(
                        'type' => 'datetime',
                        'title' => array('text' => 'Tempo'),
                    ),
                    'yAxis' => array(
                        'title' => array('text' => 'Pesos (Kg)'),
                        'floor' => 0,
                    ),
                    'tooltip' => array(
                        'pointFormat' => '{point.x:%e. %b}: {point.y:.1f} kg',
                    ),
                    'series' => array(
                        array(
                            'name' => 'Na consulta',
                            'data' => $pesos['valoresConsulta']
                        ),
                        array(
                            'name' => 'Em casa',
                            'data' => $pesos['valoresCasa']
                        ),
                    ),
                )
            )); else echo "Não existem registos de peso disponiveis!"
    ?>
</div>
<!--<h4>Histórico de Massa Gorda</h4>-->
<div>
    <?php if ($massa['valores'] != null)
        $this->Widget('ext.highcharts.HighchartsWidget',
            array(
                'id' => 'grafico_massa',
                'options' => array(
                    'chart' => array(
                        'borderWidth' => 2,
                        'borderColor' => '#c3d9ff',
                        'zoomType' => 'x',
//            'marginBottom'=>5,

                    ),
                    'title' => array('text' => 'Histórico de Massa Gorda'),
                    'subtitle'=>array(
                        "text"=>CHtml::link("Ver tabela de massa gorda",
                            Yii::app()->createUrl('dadosAntro/admin',array(
                                "DadosAntro[nomeUtenteSearch]"=>$modelUtente->nome,
                                "DadosAntro[tipoMedicaoSearch]"=>"massa gorda"

                            ))),
                        "useHTML"=>true,
                        ),
                    'xAxis' => array(
                        'type' => 'datetime',
                        'title' => array('text' => 'Tempo'),
                    ),
                    'yAxis' => array(
                        'title' => array('text' => 'Massa Gorda (%)'),
                        'floor' => 0,
                    ),
                    'series' => array(
                        array(
                            'name' => 'Na consulta',
                            'data' => $massa['valores'],
                        ),

                    ),
                )
            )); else echo "Não existem registos de massa gorda disponiveis!" ?>
</div>
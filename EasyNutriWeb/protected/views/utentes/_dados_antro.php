<?php
/* var $dpDadosAntro CActiveDataProvider VResumosAntro*/
/* var $model Utente*/
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_INLINE,
    'action'=>Yii::app()->createUrl("dadosAntro/admin&DadosAntro[nomeUtenteSearch]=".$model->nome),
)); ?>
<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Todos os dados antropométricos', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
)); ?>

<?php $this->endWidget(); ?>

<h4>Últimos Dados Antropométricos</h4>

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
            'name' => 'valor',
            'value' => 'number_format($data->valor, 2)',
        ),
        array(
            'header' => 'Data/Hora',
            'value'=>'date("Y-m-d H:i", strtotime($data->data))',
            'htmlOptions' => array('style' => 'width: 350px;'),
        ),
        'local'
    ),

)); ?>
<h4>Estatísticas</h4>
<?php
//echo TbHtml::buttonGroup(
//    array(
//        array(
//            'label' => 'Todos',
//            'id' => 'escala-todos',
//            'url'=>'#graficos',
//        ),
//        array('label' => 'Último mês','url'=>'#graficos',),
//        array('label' => 'Últimos 6 meses','url'=>'#graficos',),
//        array('label' => 'Último ano','url'=>'#graficos',  ),
//    ),
//    array(
//        'toggle' => TbHtml::BUTTON_TOGGLE_RADIO,
//        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
//        'id'=>'escalas'
//    )   ); ?>

<div id="graficos"></div>

<script type="text/javascript">

    var getGraphs = function (escala) {
        $.ajax({
            type: 'GET',
            url: '<?php echo
                Yii::app()->createAbsoluteUrl("dadosAntro/ViewGraphs&idUtente=$model->id"); ?>' +
                '&escala=' + escala,
            success: function (data) {
                $('#graficos').html(data);
                // $('#spinner_place').empty();
            },
            error: function (data) { // if error occured
                alert("Ocorreu um erro a obter os gráficos");
                //$('#spinner_place').empty();
            },
            dataType: 'html'
        });
    }
    $(document).ready(function () {
            console.log('getgraphs');
            getGraphs('<?php echo(DadosAntro::$TODOS);?>');
        }
    );
</script>

<script type="text/javascript">
    $('.form-actions').addClass('btnFormsViewUtentes');
    $('.form-actions').removeClass('form-actions');
</script>
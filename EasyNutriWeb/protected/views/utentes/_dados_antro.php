<?php
/* var $dpDadosAntro CActiveDataProvider VResumosAntro*/
/* var $model Utente*/
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_INLINE,
    'action'=>Yii::app()->createUrl("dadosAntro/admin&DadosAntro[nomeUtenteSearch]=".urlencode($model->nome)),
)); ?>
<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Todos os dados antropométricos', array('id'=>'btnTodosDadosAntro', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
)); ?>

<?php $this->endWidget(); ?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_INLINE,
    'action'=>Yii::app()->createUrl('dadosAntro/create'),
)); ?>
<input type="hidden" name="DadosAntro[utente]" value="<?php echo $model->id ?>">
<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Novo Dado Antropométrico', array('class'=>'btnAddDadosAntro','icon'=>'plus')),
)); ?>

<?php $this->endWidget(); ?>


<h4>Últimos Dados Antropométricos</h4>

<?php echo TbHtml::button('', array('class'=>'btnRefresh', 'icon' => 'refresh', 'onclick'=>'btnRefreshDadosAntro();')); ?>

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
            'header' => 'Data/Hora',
            'value'=>'date("Y-m-d H:i", strtotime($data->data))',
            'htmlOptions' => array('style' => 'width: 150px;'),
        ),
        array(
            'name' => 'valor',
            'value' => 'number_format($data->valor, 2)',
        ),
       array(
           'name'=>'observacoes',
           'value'=>'$data->observacoes==""?"Sem Observações":$data->observacoes',
       ),
        array(
            'name' => 'local',
            'htmlOptions' => array('style' => 'width: 100px;'),
        ),

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
<div id="spinner_graficos"></div>

<script type="text/javascript">

    var getGraphs = function (escala) {
        mostrarSpinner('spinner_graficos');
        $.ajax({
            type: 'GET',
            url: '<?php echo
                Yii::app()->createAbsoluteUrl("dadosAntro/ViewGraphs&idUtente=$model->id"); ?>' +
                '&escala=' + escala,
            success: function (data) {
                $('#graficos').html(data);
                 esconderSpinner('spinner_graficos');
            },
            error: function (data) { // if error occured
                alert("Ocorreu um erro a obter os gráficos");
                esconderSpinner('spinner_graficos');
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


    function btnRefreshDadosAntro(){
        window.location = '<?php Yii::app()->getRequest()->getURL(); ?>'+"#tab_4";
        window.location.reload();
    }

</script>
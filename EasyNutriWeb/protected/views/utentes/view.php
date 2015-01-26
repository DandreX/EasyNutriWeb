<?php
/* @var $this UtentesController */
/* @var $model Utentes */
/* @var $modelDiarioAlimentar DiarioAlimentar */
/* @var $dpDadosAntro CActiveDataProvider */
/* @var $dpNotificacoes CActiveDataProvider */
/* @var $tabIndex int */
/* @var $modelHabitosAlimentares HabitosAlimentares */
/* @var $dpNotasConsulta CActiveDataProvider */
$this->menu = array(
    //array('label'=>'List Utentes', 'url'=>array('index')),
    array('label' => 'Meus Utentes', 'url' => array('admin')),
    array('label' => 'Novo Utente', 'url' => array('create')),
);

?>
<?php echo TbHtml::button('Enviar notificação', array(
    'id' => 'btnEnviarNotificacao',
    'color' => TbHtml::BUTTON_COLOR_SUCCESS,
    'size' => TbHtml::BUTTON_SIZE_DEFAULT,
    'data-toggle' => 'modal',
    'data-target' => '#ModalNotificacao',
)); ?>
<?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'ModalNotificacao',
    'header' => 'Nova Notificação',
    'content' => '',
    'footer' => array(
        TbHtml::button('Enviar Notificação',
            array('id' => 'btnCreateNot',
                'data-dismiss' => 'modal',
                'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Cancelar', array(
            'id' => 'btnCancelarNot',
            'color' => TbHtml::BUTTON_COLOR_DANGER,
            'data-dismiss' => 'modal')),
    ),
)); ?>

<h2><?php echo $model->nome; ?></h2>

<?php echo TbHtml::tabbableTabs(array(
    array('label' => 'Perfil', 'content' => $this->renderPartial('_form',
            array('model' => $model
            ),
            true)),
    array('label' => 'Ficha Clínica', 'content' => $this->renderPartial('_ficha_clinica',
            array('model' => $model,
                'modelFichaClinica' => $modelFichaClinica,
            ),

            true)),
    array('label' => 'Hábitos', 'content' => $this->renderPartial('_habitos_alimentares',
            array('model'=>$model,
                'modelHabitosAlimentares' => $modelHabitosAlimentares,
            ),
            true)),
    array('label' => 'Dados Antropométricos', 'content' => $this->renderPartial('_dados_antro', array(
            'dpDadosAntro' => $dpDadosAntro,
            'model' => $model,
            //'graficos'=>$graficos,
        ), true)),
    array('label' => 'Plano Alimentar', 'content' => $this->renderPartial('_plano_alimentar',
            array('model' => $model,
            ), true)
    ),
    array('label' => 'Notificações', 'content' => $this->renderPartial('_notificacoes',
            array('dpNotificacoes' => $dpNotificacoes,
            ),
            true)),


        array('label' => 'Notas de Consulta', 'content' => $this->renderPartial('_notas_consulta',
            array('model' => $model,
                'dpNotasConsulta' => $dpNotasConsulta,
            ),
            true)),
    array('label' => 'Diário Alimentar', 'content' => $this->renderPartial('_diario_alimentar_utentes',
            array('model' => $model,
                'dataProvider' => $dataProvider,
                'datasDiario' => $dataDiario,
            ),
            true)),
    ))
    ?>




<script type="text/javascript">

    var submeterNotificacao = function(){
        var data = $("#notificacoes-form").serialize() + '&idUtente=' + '<?php echo($model->id) ?>';
        console.log(data);
        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("notificacoes/AjaxCreate"); ?>',
            data: data,
            success: function (data) {
                $('#Notificacoes_assunto').val('');
                $('#Notificacoes_descricao').val('');
                alert("Notificação enviada com sucesso");
            },
            error: function (data) { // if error occured
                alert("Erro ao enviar notificação.\nVerifique se todos os campos estão preenchidos.");
            },
            dataType: 'html'
        });
    }

    $(document).ready(function () {
        var tab = window.location.hash;
        tab = tab == "" ? '#tab_1' : tab;
        var link = $('[href="' + tab + '"]');
        link.click();
        $('[role="menuitem"] a').click(function () {
            window.location.hash = $(this).attr("href");
        });

        $.ajax({
            type: 'GET',
            url: '<?php echo Yii::app()->createAbsoluteUrl("notificacoes/AjaxCreate"); ?>',
            success: function (data) {
                $('.modal-body').html(data);
            },
            error: function (data) { // if error occured
                alert("Ocorreu um erro");
            },
            dataType: 'html'
        });

        //Submeter notificacao
        $('#btnCreateNot').click(function () {
           submeterNotificacao();
        });
        $('#notificacoes-form').live('submit',function(event){
            console.log('notificacao enter');
            submeterNotificacao();
            event.preventDefault();
        });


        $('#btnCancelarNot').click(function () {
            $('#Notificacoes_assunto').val('');
            $('#Notificacoes_descricao').val('');
        });
    });



</script>
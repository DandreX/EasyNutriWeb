<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentarForm */
/* @var $refeicoes TiposRefeicao */


Yii::app()->clientScript->registerScriptFile(
    Yii::app()->baseUrl . '/js/PlanoAlimentarForm.js',
    CClientScript::POS_END
);


$this->breadcrumbs = array(
    'Passo 1', 'Passo 2', 'Passo 3', 'Passo 4',
);

?>

<h4>Utente: <?php echo($model->utenteNome) ?></h4>
<h3>Plano Alimentar</h3>
<?php if (!empty($model->errors["plano"])): ?>
    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, implode('<br>', $model->errors["plano"])); ?>
<?php endif; ?>
<div id="formPlanoStep3">
    <!--    --><?php //$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    //        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    //        'id' => 'formPlanoAlimentar'
    //    ));
    ?>
    <?php echo TbHtml::beginFormTb(); ?>
    <!--valores do form anterior-->
    <input type="hidden" id="passoAtual" name="passoAtual" value="4">
    <input type="hidden" id="irPara" name="irPara" value="5">


    <input type="hidden" name="PlanoAlimentarForm[actividade]" id="PlanoAlimentarForm_actividade"
           value="<?php echo($model->actividade); ?>">
    <input type="hidden" name="PlanoAlimentarForm[pesoAtual]" id="PlanoAlimentarForm_pesoAtual"
           value="<?php echo($model->pesoAtual); ?>">
    <input name="PlanoAlimentarForm[altura]" id="PlanoAlimentarForm_altura" type="hidden"
           value="<?php echo($model->altura); ?>">
    <input name="PlanoAlimentarForm[pesoAcordado]" id="PlanoAlimentarForm_pesoAcordado" type="hidden"
           value="<?php echo($model->pesoAcordado); ?>">
    <input type="hidden" id="PlanoAlimentarForm_neds" name="PlanoAlimentarForm[neds]"
           value="<?php echo($model->neds); ?>">
    <input type="hidden" id="PlanoAlimentarForm_restricaoNeds" name="PlanoAlimentarForm[restricaoNeds]"
           value="<?php echo($model->restricaoNeds); ?>">
    <input type="hidden" name="PlanoAlimentarForm[utenteId]" id="PlanoAlimentarForm_utenteId"
           value="<?php echo($model->utenteId); ?>">
    <input type="hidden" name="PlanoAlimentarForm[utenteNome]" id="PlanoAlimentarForm_utenteNome"
           value="<?php echo($model->utenteNome); ?>">
    <input type="hidden" name="PlanoAlimentarForm[sexo]" id="PlanoAlimentarForm_sexo"
           value="<?php echo($model->sexo); ?>">
    <!--END valores do form anterior-->


    <div id="detalhesPlanoAlimentar">
        <hr>
        <?php foreach ($refeicoes as $refeicao): ?>
            <div id="<?php echo('refeicao' . $refeicao->id); ?>">
                <h4><?php echo($refeicao->descricao) ?></h4>

                <p>Hora:
                    <?php
                    $this->widget('editable.Editable', array(
                        'type' => 'combodate',
                        'name' => 'horasRefeicao[' . $refeicao->id . ']',
                        'text' => date('H:i', strtotime($model->horasRefeicao[$refeicao->id])),
                        'placement' => 'right',
                        'format' => 'YYYY-MM-DD HH:mm', //in this format date sent to server
                        'viewformat' => 'HH:mm', //in this format date is displayed
                        'template' => 'HH:mm', //template for dropdowns
                        'combodate' => array('minYear' => 1980, 'maxYear' => 2013),
                    ));
                    ?></p>
                <br>

                <div class="linhasRefeicao">
                    <?php if (!empty($model->plano[$refeicao->id])): ?>
                        <?php $idLinha = 1000;?>
                        <?php foreach ($model->plano[$refeicao->id] as $refeicaoPlano): ; ?>
<!--                            --><?php //var_dump($refeicaoPlano)?>
                            <?php $this->actionReloadLinhas($refeicaoPlano,$refeicao->id,$idLinha--); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!--                linha de refeicao é injetada aqui com AJAX-->
                </div>
                <?php echo TbHtml::button('+',
                    array(
                        'class' => 'btnAddLinha',
                        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                    )); ?>
                <?php echo TbHtml::button('Pesquisar alimento',
                    array(
                        'class' => 'btnAbrirModal',
                        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                        'data-toggle' => 'modal',
                        'data-target' => '#modalPesquisa',)); ?>


            </div>
            <hr>
        <?php endforeach; ?>
        <br>

    </div>
    <div>

        <p>Prescrição Diatetica / Notas</p>
        <?php ?>
        <?php echo TbHtml::textArea('PlanoAlimentarForm[prescricao]',
            isset($model->prescricao)?$model->prescricao:''
            , array('rows' => 5)); ?>
        <?php echo TbHtml::checkBox('PlanoAlimentarForm[verEquivalencias]', true, array(
            'label' => 'Permitir acesso à tabela de equivalencias')); ?>

    </div>

    <br>
    <?php echo TbHtml::button('Anterior', array('id' => 'btnAnterior')); ?>
    <?php echo TbHtml::submitButton('Guardar', array(
        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
        'id' => 'btnSubmeter')); ?>


    <?php echo TbHtml::endForm(); ?>

    <?php $this->widget('bootstrap.widgets.TbModal', array(
        'id' => 'modalPesquisa',
        'backdrop' => true,
        'header' => 'Pesquisar Alimento',
        'onHide' => 'js:limparModal',
        'onShown' => 'js:attachModalListenner',
        'content' => $this->renderPartial('_modal_layout', array(), true, false),
        'footer' => array(
            TbHtml::button('Adicionar', array(
                'id' => 'addAlimento',
                'data-dismiss' => 'modal',
                'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::button('Cancelar', array(
                'id' => 'btnCloseModal',
                'data-dismiss' => 'modal')),
        ),
    )); ?>
</div>

<script type="text/javascript">

    var attachModalListenner = function () {
        console.log('attached listenner');
        var inputText = $('#queryAlimento');
        inputText.focus();
        inputText.keyup(function () {
            var queryVal = inputText.val();
            pesquisarAlimento(queryVal);
        });
        $('#addAlimento').click(function () {

        });
    };

    var pesquisarAlimento = function (query) {
        $.ajax({
            type: 'GET',
            url: '<?php echo Yii::app()->createAbsoluteUrl("planosAlimentares/popularModal&query="); ?>' + query,
            success: function (data) {
                $('#modalPesquisa div.modal-body div#modalPesquisaResultados').html(data);
                $('#modalPesquisa div.modal-body div#modalPesquisaResultados tr').live('click', function () {
                    $(this).siblings().find(':checkbox').prop('checked', false);
                    $(this).siblings().removeClass('selected');
                    $(this).addClass('selected');
                    $(this).find(':checkbox').prop('checked', true);
                });
            },
            error: function (data) { // if error occured
                alert("Ocorreu um erro");
            },
            dataType: 'html'
        });
    }

    var limparModal = function () {
        $('div#modalPesquisaResultados').empty();
        $('#queryAlimento').val('');
    }

    $(document).ready(function () {
        var divLinhasRefeicao = null;
        var divLinhaHtml = null;
        var divProprio;
        var linhas = {
            1: 0,
            2: 0,
            3: 0,
            4: 0,
            5: 0,
            6: 0
        }
        //guardar div que foram clicados
        $('.btnAbrirModal, .btnAddLinha').click(function () {
            divLinhasRefeicao = $(this).parent().find('.linhasRefeicao');
        });

        //adicona nova linha quando é adicionado um alimento
        $('#addAlimento').click(function () {
            // divLinhaHtml.insertBefore(divLinhaHtml.lastChild());
            // divLinhasRefeicao.append(divLinhaHtml);
            var idAlimento = $('#tabelaPesquisa tr.selected td:first-child').text();
            var div = divLinhasRefeicao;
            var idRefeicao = div.parent().attr('id').replace('refeicao', '');
            idRefeicao = parseInt(idRefeicao);
            var idLinha = linhas[idRefeicao]++;
            if (idAlimento != '') {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo Yii::app()->createAbsoluteUrl("planosAlimentares/addAlimento"); ?>'
                        + '&idAlimento=' + idAlimento + "&idRefeicao=" + idRefeicao + "&idLinha=" + idLinha,
                    success: function (data) {
                        div.append(data);
                    },
                    error: function (data) { // if error occured
                        alert("Ocorreu um erro");
                    },
                    dataType: 'html'
                });
            } else {
                console.log('Escola um alimento');
            }


        });
        //remove linha
        $('.btnApagarLinha').live("click", function () {
            divLinhasRefeicao = $(this).parent().parent();
            $(this).parent().remove();

        });

        //Adiciona uma linha vazia
        $('.btnAddLinha').click(function () {
            var div = divLinhasRefeicao;
            var idRefeicao = div.parent().attr('id').replace('refeicao', '');
            idRefeicao = parseInt(idRefeicao);
            var idLinha = linhas[idRefeicao]++;
            $.ajax({
                type: 'GET',
                url: '<?php echo Yii::app()->createAbsoluteUrl("planosAlimentares/addLinhaVazia"); ?>'
                    + "&idRefeicao=" + idRefeicao + "&idLinha=" + idLinha,
                success: function (data) {
                    div.append(data);
                },
                error: function (data) { // if error occured
                    alert("Ocorreu um erro");
                },
                dataType: 'html'
            });
        });

        //Adiciona as horas de refeicao ao form antes de submeter
        $('div#formPlanoStep3 form').submit(function () {
            for (var i = 1; i <= 6; i++) {
                var hora = $('[rel="horasRefeicao[' + i + ']_new"]').text();
                var input = $("<input>")
                    .attr("type", "hidden")
                    .attr("name", "PlanoAlimentarForm[horasRefeicao][" + i + "]").val(hora);
                $(this).append(input);
            }
        });
    });


</script>
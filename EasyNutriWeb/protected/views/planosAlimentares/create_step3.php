<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentarForm */

Yii::app()->clientScript->registerScriptFile(
    Yii::app()->baseUrl.'/js/PlanoAlimentarForm.js',
    CClientScript::POS_END
);

$this->breadcrumbs = array(
    'Passo 1','Passo 2', 'Passo 3',
);


?>
<h4>Utente: <?php echo($model->utenteNome)?></h4>
<h3>Distribuicao por refeições</h3>
<div id="formPlanoStep3">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id'=>'formPlanoAlimentar'
    )); ?>

    <!--valores do form anterior-->
    <input type="hidden" id="passoAtual" name="passoAtual" value="3">
    <input type="hidden" id="irPara" name="irPara" value="4" >


    <input type="hidden" name="PlanoAlimentarForm[actividade]" id="PlanoAlimentarForm_actividade"
           value="<?php echo($model->actividade); ?>" >
    <input type="hidden" name="PlanoAlimentarForm[pesoAtual]" id="PlanoAlimentarForm_pesoAtual"
           value="<?php echo($model->pesoAtual); ?>">
    <input name="PlanoAlimentarForm[altura]" id="PlanoAlimentarForm_altura" type="hidden"
           value="<?php echo($model->altura); ?>">
    <input name="PlanoAlimentarForm[pesoAcordado]" id="PlanoAlimentarForm_pesoAcordado" type="hidden"
           value="<?php echo($model->pesoAcordado); ?>">
    <input type="hidden" id="PlanoAlimentarForm_neds" name="PlanoAlimentarForm[neds]"
           value="<?php echo($model->neds); ?>"  >
    <input type="hidden" id="PlanoAlimentarForm_restricaoNeds" name="PlanoAlimentarForm[restricaoNeds]"
           value="<?php echo($model->restricaoNeds); ?>"  >
    <input type="hidden" name="PlanoAlimentarForm[utenteId]" id="PlanoAlimentarForm_utenteId"
           value="<?php echo($model->utenteId); ?>" >
    <input type="hidden" name="PlanoAlimentarForm[utenteNome]" id="PlanoAlimentarForm_utenteNome"
           value="<?php echo($model->utenteNome); ?>" >
    <input type="hidden" name="PlanoAlimentarForm[sexo]" id="PlanoAlimentarForm_sexo"
           value="<?php echo($model->sexo); ?>" >

    <!--END valores do form anterior-->

    <div class="calculoAlimentosRef">
        <p><b><br>Cálculo das doses <font color="red">(Opcional)</font></br></b></p>

        <?php $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'tabelaAlimentoRef',
            'itemsCssClass' => 'table-bordered items',
            'dataProvider' => $tabelaQuantAlimentos,
            'summaryText' => '',
            'selectableRows' => 0,
            'columns' => array(
                array(
                    'name' => 'refeicao',
                    'header' => 'Refeição',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                ),
//                array(
//                    'class' => 'editable.EditableColumn',
//                    'name' => 'hora',
//                    'header' => 'Hora',
//                    'headerHtmlOptions' => array('style' => 'width: 80px'),
//                    'editable' => array(
//                        'type' => 'combodate',
//                        'viewformat' => 'HH:mm',
//                        'format' => 'HH:mm',
//                        'template' => 'HH:mm',
//                        'placement' => 'right',
//                        'emptytext' => "HH:mm",
//                        'mode' => 'popup',
//                    )
//                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'leiteMG',
                    'header' => 'Leite <br>(' . $model->doses['leite'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'vegB',
                    'header' => 'Veg. B <br>(' . $model->doses['vegB'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'fruta',
                    'header' => 'Fruta <br> (' . $model->doses['fruta'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'pao',
                    'header' => 'Pao eq <br> (' . $model->doses['pao'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'suplementosA',
                    'header' => 'Sup. A <br>(' . $model->doses['supa'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'carne',
                    'header' => 'Carne eq <br> (' . $model->doses['carne'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 120px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'gordura',
                    'header' => 'Gordura <br>(' . $model->doses['gordura'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
            ),
        ));
        ?>



        <?php echo TbHtml::formActions(array(
            TbHtml::button('Anterior', array('id'=>'btnAnterior')),
            TbHtml::submitButton('Proximo', array(
                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                'id'=>'btnSubmeter'
            )),
        )); ?>
        <?php $this->endWidget(); ?>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {
            for (coluna = 2; coluna <= 8; coluna++) {
                $('#tabelaAlimentoRef > table >tbody  tr:last-child td:nth-child(' + coluna + ')').empty();
            }
            $('#tabelaAlimentoRef > table >tbody  tr:last-child td').css('background-color', 'lightblue');

            $('#tabelaAlimentoRef table >tbody tr>td').change(function () {
                    setTimeout(function () {
                        for (colunas = 2; colunas <= 8; colunas++) {
                            var calcTotal = 0;
                            for (linhas = 1; linhas <= 6; linhas++) {
                                var valor = $('#tabelaAlimentoRef > table >tbody  tr:nth-child(' + linhas + ')>td:nth-child(' + colunas + ')').text();

                                calcTotal = calcTotal + parseFloat(valor);
                            }
                            console.log(calcTotal);
                            $('#tabelaAlimentoRef > table >tbody  tr:nth-child(7)>td:nth-child(' + colunas + ')').text(calcTotal.toFixed(1));
                        }
                    }, 200);
                }
            );
        });

    </script>
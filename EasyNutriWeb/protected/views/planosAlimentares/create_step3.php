<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentarForm */

$this->breadcrumbs = array(
    'Planos Alimentares' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List PlanosAlimentares', 'url' => array('index')),
    array('label' => 'Manage PlanosAlimentares', 'url' => array('admin')),
);
?>

<h3>Distribuicao por refeições</h3>
<div id="formPlanoStep3">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    )); ?>

    <input type="hidden" id="PlanoAlimentarForm_passo" name="PlanoAlimentarForm[passo]" value="3">

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
                    'header' => 'Leite (' . $model->doses['leite'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'vegB',
                    'header' => 'Veg. B (' . $model->doses['vegB'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'fruta',
                    'header' => 'Fruta (' . $model->doses['fruta'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'pao',
                    'header' => 'Pao eq (' . $model->doses['pao'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'suplementosA',
                    'header' => 'Sup. A (' . $model->doses['supa'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'carne',
                    'header' => 'Carne eq (' . $model->doses['carne'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 120px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
                array(
                    'class' => 'editable.EditableColumn',
                    'name' => 'gordura',
                    'header' => 'Gordura (' . $model->doses['gordura'] . ' doses)',
                    'headerHtmlOptions' => array('style' => 'width: 110px'),
                    'editable' => array(
                        'emptytext' => "0",
                    ),
                ),
            ),
        ));
        ?>

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
                        }, 400);
                    }
                );
            });

        </script>

        <?php echo TbHtml::formActions(array(
            TbHtml::submitButton('Proximo', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        )); ?>
        <?php $this->endWidget(); ?>
    </div>
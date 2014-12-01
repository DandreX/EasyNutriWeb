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

<h3>Distribuicao das NEDs por macronutrientes</h3>

<p><b>NEDs estipulados:</b> <?php echo($model->neds); ?> Kcal</p>

<div id="formPlanoStep2">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<input type="hidden" id="PlanoAlimentarForm_passo" name="PlanoAlimentarForm[passo]" value="2">


<div class="tabelaInput">
    <?php echo TbHtml::controlsRow(array(
        TbHtml::uneditableField('Variável', array('span' => 2)),
        TbHtml::uneditableField('Valor de Referência', array('span' => 3)),
        TbHtml::uneditableField('%NED', array('span' => 2)),
        TbHtml::uneditableField('Gramas/Kg', array('span' => 2)),
        TbHtml::uneditableField('Gramas', array('span' => 2)),
    )); ?>
    <?php echo TbHtml::controlsRow(array(
        TbHtml::uneditableField('Proteínas', array('span' => 2)),
        TbHtml::uneditableField('15%-35%', array('span' => 3)),
        TbHtml::textField('text', '', array('span' => 2, 'id' => 'percProteinas')),
        TbHtml::textField('text', '', array('span' => 2, 'id' => 'gramasKgProteinas')),
        TbHtml::uneditableField('', array('span' => 2, 'id' => 'gramasProteinas')),
    )); ?>
    <?php echo TbHtml::controlsRow(array(
        TbHtml::uneditableField('Lípidos', array('span' => 2)),
        TbHtml::uneditableField('20%-35%', array('span' => 3)),
        TbHtml::textField('text', '', array('span' => 2, 'id' => 'percLipidos')),
        TbHtml::uneditableField('-', array('span' => 2)),
        TbHtml::uneditableField('', array('span' => 2, 'id' => 'gramasLipidos')),
    )); ?>
    <?php echo TbHtml::controlsRow(array(
        TbHtml::uneditableField('Hidratos de Carbono', array('span' => 2)),
        TbHtml::uneditableField('45%-60%', array('span' => 3)),
        TbHtml::textField('text', '', array('span' => 2, 'id' => 'percGlicidos')),
        TbHtml::uneditableField('-', array('span' => 2)),
        TbHtml::uneditableField('', array('span' => 2, 'id' => 'gramasGlicidos')),
    )); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var neds = <?php echo($model->neds); ?>;
        var peso = 72.3;
        console.log(neds);
        $('#percProteinas').change(function () {
            var percProteinas = $('#percProteinas').val();
            var gProteinas = (percProteinas / 100 * neds) / 4;
            var gkg = (gProteinas / 72.3);
            $('#gramasProteinas').text(gProteinas.toFixed(0));
            $('#gramasKgProteinas').val(gkg.toFixed(1));
        });
        $('#gramasKgProteinas').change(function () {


            var gramasKg = $('#gramasKgProteinas').val();
            gramasKg = parseFloat(gramasKg);
            var percProteinas = (72.3 * gramasKg * 4) * 100 / neds;
            var gProteinas = peso * gramasKg;
            console.log(percProteinas);
            $('#percProteinas').val(percProteinas.toFixed(0));
            $('#gramasProteinas').text(gProteinas.toFixed(0));
        });
        $('#percLipidos').change(function () {
            var percLipidos = $('#percLipidos').val();

            var gLipidos = (percLipidos / 100 * neds) / 9;
            $('#gramasLipidos').text(gLipidos.toFixed(0));
        });
        $('#percGlicidos').change(function () {
            var percGlicidos = $('#percGlicidos').val();
            var gGlicidos = (percGlicidos / 100 * neds) / 4;
            $('#gramasGlicidos').text(gGlicidos.toFixed(0));
        });
    });
</script>


<div class="calculoDoses">
    <p><b><br>Cálculo das doses</br></b></p>

    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'tabelaDistribuicao',
        'itemsCssClass' => 'table-bordered items',
        'dataProvider' => $tabelaDistribuicao,
        'summaryText' => '',
        'selectableRows' => 0,
        'columns' => array(
            array(
                'name' => 'alimento',
                'header' => 'Alimentos',
                'headerHtmlOptions' => array('style' => 'width: 110px'),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'doses',
                'header' => 'Doses',
                'headerHtmlOptions' => array('style' => 'width: 110px'),
                'editable' => array(
                    'emptytext' => "0",
                ),
            ),
            array(
                'name' => '',
                'header' => 'Proteinas',
                'headerHtmlOptions' => array('style' => 'width: 110px'),
            ),
            array(
                'name' => 'gordura',
                'header' => 'Lípidos',
                'headerHtmlOptions' => array('style' => 'width: 110px'),
            ),
            array(
                'name' => 'hc',
                'header' => 'Hidratos de Carbono',
                'headerHtmlOptions' => array('style' => 'width: 110px'),
            ),
            array(
                'name' => 'calorias',
                'header' => 'Calorias',
                'headerHtmlOptions' => array('style' => 'width: 110px'),
            ),

        ),
    ));
    ?>

    <script type="text/javascript">
        var calculoSubTotal = function (cInicio, cFim, lInicio, lFim) {
            for (colunas = cInicio; colunas <= cFim; colunas++) {
                calcSubTotal = 0;
                for (linhas = lInicio; linhas <= lFim; linhas++) {
                    var doseColuna = $('#tabelaDistribuicao > table >tbody  tr:nth-child(' + linhas + ')>td:nth-child(' + colunas + ')').text();
                    calcSubTotal = calcSubTotal + parseInt(doseColuna);

                }
                $('#tabelaDistribuicao > table >tbody  tr:nth-child(' + (lFim + 1) + ') >td:nth-child(' + colunas + ')').text(calcSubTotal.toFixed(1));
                //--------------------
            }

        };

        var calcDosesPao = function () {
            var subTotalHC = $('#tabelaDistribuicao > table >tbody  tr:nth-child(6) >td:nth-child(5)').text();
            var totalHC = $('#gramasGlicidos').text();
            if (subTotalHC != 0) {
                dosesPao = (parseInt(totalHC) - parseInt(subTotalHC)) / 15;
                $('#tabelaDistribuicao > table >tbody  tr:nth-child(7) >td:nth-child(2)').text(dosesPao.toFixed(0));
                for (i in equivalencias) {
                    alimento = equivalencias[7];
                    for (j in alimento) {
                        var nutrival = alimento[j];
                        var calc = dosesPao * nutrival;
                        $('#tabelaDistribuicao > table >tbody  tr:nth-child(7) >td:nth-child(' + j + ')').text(calc.toFixed(1));
                    }
                }
            }
        };

        var calcDosesCarne = function () {
            var subTotalProteinas = $('#tabelaDistribuicao > table >tbody  tr:nth-child(9) >td:nth-child(3)').text();
            var totalProteinas = $('#gramasProteinas').text();
            if (subTotalProteinas != 0) {
                dosesProteinas = (parseInt(totalProteinas) - parseInt(subTotalProteinas)) / 7;
                $('#tabelaDistribuicao > table >tbody  tr:nth-child(10) >td:nth-child(2)').text(dosesProteinas.toFixed(0));
                for (i in equivalencias) {
                    alimento = equivalencias[10];
                    for (j in alimento) {
                        var nutrival = alimento[j];
                        var calc = dosesProteinas * nutrival;
                        $('#tabelaDistribuicao > table >tbody  tr:nth-child(10) >td:nth-child(' + j + ')').text(calc.toFixed(1));
                    }
                }
            }
        };

        var calcDosesGordura = function () {
            var subTotalLipidos = $('#tabelaDistribuicao > table >tbody  tr:nth-child(11) >td:nth-child(4)').text();
            var totalLipidos = $('#gramasLipidos').text();
            if (subTotalLipidos != 0) {
                dosesGordura = (parseInt(totalLipidos) - parseInt(subTotalLipidos)) / 5;
                $('#tabelaDistribuicao > table >tbody  tr:nth-child(12) >td:nth-child(2)').text(dosesGordura.toFixed(0));
                for (i in equivalencias) {
                    alimento = equivalencias[12];
                    for (j in alimento) {
                        var nutrival = alimento[j];
                        var calc = dosesGordura * nutrival;
                        $('#tabelaDistribuicao > table >tbody  tr:nth-child(12) >td:nth-child(' + j + ')').text(calc.toFixed(1));
                    }
                }
            }
        };


        $(document).ready(function () {
            $('#tabelaDistribuicao > table >tbody  tr:nth-child(6) >td:nth-child(2)').empty();
            $('#tabelaDistribuicao > table >tbody  tr:nth-child(9) >td:nth-child(2)').empty();
            $('#tabelaDistribuicao > table >tbody  tr:nth-child(11) >td:nth-child(2)').empty();
            $('#tabelaDistribuicao > table >tbody  tr:nth-child(13) >td:nth-child(2)').empty();

            $('#tabelaDistribuicao > table >tbody> tr')
                .filter(':nth-child(6),:nth-child(9),:nth-child(11)')
                .css('background-color', 'aliceblue');
            $('#tabelaDistribuicao > table >tbody> tr')
                .filter(':nth-child(13)')
                .css('background-color', 'lightblue');


            $('#tabelaDistribuicao > table >tbody tr>td:nth-child(2)').change(function () {
                setTimeout(function () {
                    for (i in equivalencias) {
                        alimento = equivalencias[i];
                        if (i != 6 && i != 9 && i != 11 && i != 13) {
                            var dose = $('#tabelaDistribuicao > table >tbody  tr:nth-child(' + i + ')>td:nth-child(2) a').text();
                            for (j in alimento) {
                                var nutrival = alimento[j];
                                var calc = dose * nutrival;
                                $('#tabelaDistribuicao > table >tbody  tr:nth-child(' + i + ') >td:nth-child(' + j + ')').text(calc);
                            }
                        }
                    }
                    calculoSubTotal(3, 6, 1, 5);
                    calcDosesPao();
                    calcDosesCarne();
                    calcDosesGordura();
                    calculoSubTotal(3, 6, 6, 8);
                    calculoSubTotal(3, 6, 9, 10);
                    calculoSubTotal(3, 6, 11, 12);

                }, 400);

            });
        })
        ;

    </script>


</div>







<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Proximo', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
)); ?>

<?php $this->endWidget(); ?>
</div>

<script>

    var equivalencias = {
        '1': {
            3: 7,
            4: 7,
            5: 12,
            6: 137
        },
        '2': {
            3: 7,
            4: 4,
            5: 12,
            6: 106
        },
        '3': {
            3: 7,
            4: 1.2,
            5: 10,
            6: 80
        },
        '4': {
            3: 2,
            4: 0,
            5: 5,
            6: 25
        },
        '5': {
            3: 0,
            4: 0,
            5: 10,
            6: 50
        },
        '6': {
            3: 0,
            4: 0,
            5: 0,
            6: 0
        },
        '7': {
            3: 2,
            4: 0,
            5: 15,
            6: 70
        },
        '8': {
            3: 0,
            4: 0,
            5: 15,
            6: 60
        },
        '9': {
            3: 0,
            4: 0,
            5: 0,
            6: 0
        },
        '10': {
            3: 7,
            4: 3,
            5: 0,
            6: 55
        },
        '11': {
            3: 0,
            4: 0,
            5: 0,
            6: 0
        },
        '12': {
            3: 0,
            4: 5,
            5: 0,
            6: 45
        },
        '13': {
            3: 0,
            4: 0,
            5: 0,
            6: 0
        }

    }
</script>
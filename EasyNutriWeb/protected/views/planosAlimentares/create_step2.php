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
                    'name' => 'proteinas',
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
            $(document).ready(function () {
                $('#tabelaDistribuicao > table >tbody> tr')
                    .filter(':nth-child(6),:nth-child(9),:nth-child(11)')
                    .css('background-color', 'aliceblue');
                $('#tabelaDistribuicao > table >tbody> tr')
                    .filter(':nth-child(13)')
                    .css('background-color', 'lightblue');


                $('#tabelaDistribuicao > table >tbody tr>td:nth-child(2)').change(function () {
                    setTimeout(function () {
                        linha = 1;
                        calcSubTotal = 0;
                        console.log('alterado uma dose');
                        for (i in equivalencias) {
                            var alimento = equivalencias[i];
                            var linhaDose = $('#tabelaDistribuicao > table >tbody  tr:nth-child(' + linha + ')>td:nth-child(2) a').attr('data-pk');
                            var dose = $('#tabelaDistribuicao > table >tbody  tr:nth-child(' + linhaDose + ')>td:nth-child(2) a').text();

                            for (j in alimento) {
                                var nutrival = alimento[j];
                                var calc = dose * nutrival;
                                $('#tabelaDistribuicao > table >tbody  tr:nth-child(' + linhaDose + ') >td:nth-child(' + j + ')').text(calc);


//                                concluir com função com ciclo for

                                for (i = 1; i < 5; i++) {
                                    var doseColuna = $('#tabelaDistribuicao > table >tbody  tr:nth-child(' + i + ')>td:nth-child(' + j + ')').text();
                                    calcSubTotal = parseInt(calcSubTotal) + parseInt(doseColuna);
                                    $('#tabelaDistribuicao > table >tbody  tr:nth-child(6) >td:nth-child(' + j + ')').text(calcSubTotal);
                                }
                                //--------------------
                            }
                            linha++;
                        }

                    }, 1000)
                });
            });
        </script>


    </div>



    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton('Proximo', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>

    <?php $this->endWidget(); ?>
</div>

<script>

    var equivalencias = {
        'Leite Gordo': {
            3: 7,
            4: 7,
            5: 12,
            6: 137
        },
        'Leite Meio Gordo': {
            3: 7,
            4: 4,
            5: 12,
            6: 106
        },
        'Leite Magro': {
            3: 7,
            4: 1.2,
            5: 10,
            6: 80
        },
        'Vegetais B': {
            3: 2,
            4: 0,
            5: 5,
            6: 25
        },
        'Fruta': {
            3: 0,
            4: 0,
            5: 10,
            6: 50
        }

    }
</script>
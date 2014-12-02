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

<p><b>NEDs estipulados:</b> <?php echo($model->neds); ?> Kcal
   <b>Peso acordado:</b> <?php echo($model->pesoAcordado); ?> Kg
</p>


<div id="formPlanoStep2">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    'id'=>'formPasso2',
)); ?>

<!--valores do form anterior-->
<input type="hidden" id="passoAtual" name="passoAtual" value="2">
<input type="hidden" id="irPara" name="irPara" value="3" >


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

<!--END valores do form anterior-->

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
        var neds = $("#PlanoAlimentarForm_neds").val();
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
            //obter o 1º subtotal de hidratos de carbono
            var subTotalHC = $('#tabelaDistribuicao > table >tbody  tr:nth-child(6) >td:nth-child(5)').text();
            // obter gramas de glicidos definidos
            var totalHC = $('#gramasGlicidos').text();
            //se o gramas de hc estiver definido calcula doses de pao
            if (subTotalHC != 0) {
                dosesPao = (parseInt(totalHC) - parseInt(subTotalHC)) / 15;
                //preencher doses de pao na tabela
                $('#tabelaDistribuicao > table >tbody  tr:nth-child(7) >td:nth-child(2) > a').text(dosesPao.toFixed(0));
                for (i in equivalencias) {
                    alimento = equivalencias[7];
                    for (j in alimento) {
                        var nutrival = alimento[j];
                        var calc = dosesPao * nutrival;
                        $('#tabelaDistribuicao > table >tbody  tr:nth-child(7) >td:nth-child(' + j + ') ').text(calc.toFixed(1));
                    }
                }
            }
        };

        var calcDosesCarne = function () {
            var subTotalProteinas = $('#tabelaDistribuicao > table >tbody  tr:nth-child(9) >td:nth-child(3)').text();
            var totalProteinas = $('#gramasProteinas').text();
            if (subTotalProteinas != 0) {
                dosesProteinas = (parseInt(totalProteinas) - parseInt(subTotalProteinas)) / 7;
                $('#tabelaDistribuicao > table >tbody  tr:nth-child(10) >td:nth-child(2) a').text(dosesProteinas.toFixed(0));
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
                $('#tabelaDistribuicao > table >tbody  tr:nth-child(12) >td:nth-child(2) a').text(dosesGordura.toFixed(0));
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

        //verifica se as percentagem de macronutrientes estao definidas
        var verificaDistMacroNutri = function(){
                var bool = true;
                $("#percProteinas, #percLipidos, #percGlicidos").each(function(index, val){
                    var perc = $(this).val();
                   console.log( $(this).attr('id') +' '+parseInt(perc));
                    if(parseInt(perc)<=0 || isNaN(parseInt(perc))){
                        bool=false;
                    }
            });
            return bool;
        };


        $(document).ready(function () {
            //desativar enter form submit
            $('#formPasso2').on("keyup keypress", function(e) {
                var code = e.keyCode || e.which;
                if (code  == 13) {
                    e.preventDefault();
                    return false;
                }
            });

            $('#btnAnterior').click(function(){
                $('#irPara').val(1);
                $('#btnSubmeter').click();
            });

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
                if(!verificaDistMacroNutri()){
                    alert('Falta preencher a percentagem de macronutrientes');
                   $(".editable-cancel").click();
                    return;
                }
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

                }, 100);

            });
        })
        ;

    </script>


</div>







<?php echo TbHtml::formActions(array(
    TbHtml::button('Anterior',array('id'=>'btnAnterior')),
    TbHtml::submitButton('Próximo', array(
        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
        'id'=>'btnSubmeter')),

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
<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentarForm */

Yii::app()->clientScript->registerScriptFile(
    Yii::app()->baseUrl . '/js/PlanoAlimentarForm.js',
    CClientScript::POS_END
);

$this->breadcrumbs = array(
    $model->utenteNome=>(Yii::app()->createUrl('utentes/view',array('id'=>$model->utenteId))),
    'Novo plano alimentar','Passo 1', 'Passo 2',
);



?>
<h4>Utente: <?php echo($model->utenteNome) ?></h4>
<h3>Distribuicao das NEDs por macronutrientes</h3>

<p><b>NEDs estipulados:</b> <?php echo($model->neds); ?> Kcal
    <b>Peso acordado:</b> <?php echo($model->pesoAcordado); ?> Kg
</p>


<div id="formPlanoStep2">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    'id' => 'formPlanoAlimentar'
)); ?>

<!--valores do form anterior-->
<input type="hidden" id="passoAtual" name="passoAtual" value="2">
<input type="hidden" id="irPara" name="irPara" value="3">


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
<input type="hidden" name="PlanoAlimentarForm[idade]" id="PlanoAlimentarForm_idade"
       value="<?php echo($model->idade); ?>">

<?php foreach ($model->dosesDistribuidas as $key => $refeicao): ?>
    <?php foreach ($model->dosesDistribuidas[$key] as $keyMacro => $macroNutri): ?>
        <input type="hidden"
               name="PlanoAlimentarForm[dosesDistribuidas][<?php echo $key ?>][<?php echo $keyMacro ?>]"
               id="PlanoAlimentarForm_<?php echo $key ?>_<?php echo $keyMacro ?>"
               value="<?php echo $macroNutri ?>"/>
    <?php endforeach; ?>
<?php endforeach; ?>

<!--END valores do form anterior-->

<!--valores das doses a enviar no POST-->
<div id="dosesFields">
    <?php foreach ($model->doses as $key => $value): ?>
        <input type="hidden" name="PlanoAlimentarForm[doses][<?php echo($key) ?>]"
               id="PlanoAlimentarForm_dose_<?php echo($key) ?>" value="<?php echo $value?>">
    <?php endforeach; ?>
</div>
<!--END valores das doses a enviar no POST-->


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
        TbHtml::uneditableField('10%-35%', array('span' => 3)),
        TbHtml::textField('PlanoAlimentarForm[distMacro][proteinas]', $model->distMacro['proteinas'], array('span' => 2, 'id' => 'percProteinas')),
        TbHtml::textField('text', '', array('span' => 2, 'id' => 'gramasKgProteinas')),
        TbHtml::uneditableField('', array('span' => 2, 'id' => 'gramasProteinas')),
    )); ?>
    <?php echo TbHtml::controlsRow(array(
        TbHtml::uneditableField('Lípidos', array('span' => 2)),
        TbHtml::uneditableField('20%-35%', array('span' => 3)),
        TbHtml::textField('PlanoAlimentarForm[distMacro][lipidos]', $model->distMacro['lipidos'], array('span' => 2, 'id' => 'percLipidos')),
        TbHtml::uneditableField('-', array('span' => 2)),
        TbHtml::uneditableField('', array('span' => 2, 'id' => 'gramasLipidos')),
    )); ?>
    <?php echo TbHtml::controlsRow(array(
        TbHtml::uneditableField('Hidratos de Carbono', array('span' => 2)),
        TbHtml::uneditableField('45%-65%', array('span' => 3)),
        TbHtml::textField('PlanoAlimentarForm[distMacro][hc]', $model->distMacro['hc'], array('span' => 2, 'id' => 'percGlicidos')),
        TbHtml::uneditableField('-', array('span' => 2)),
        TbHtml::uneditableField('', array('span' => 2, 'id' => 'gramasGlicidos')),
    )); ?>
    <?php echo TbHtml::controlsRow(array(
        TbHtml::uneditableField('', array('id' => 'ultimaLinhaDistNed', 'span' => 2)),
        TbHtml::uneditableField('Total', array('id' => '', 'span' => 2)),
        TbHtml::uneditableField('', array('span' => 3, 'id' => 'totalVet')),
    )); ?>
</div>

<script type="text/javascript">

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
            'header' => 'Proteínas',
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
    var neds = $("#PlanoAlimentarForm_neds").val();
    var peso = 72.3;

    $('#percProteinas').change(function () {
        var percProteinas = $('#percProteinas').val();
        if (percProteinas < 10) {
            $('#percProteinas').css('color', '#FF0000');
        } else if (percProteinas > 35) {
            $('#percProteinas').css('color', '#FF0000');
        } else {
            $('#percProteinas').css('color', 'black');
        }
        var gProteinas = (percProteinas / 100 * neds) / 4;
        var gkg = (gProteinas / 72.3);
        $('#gramasProteinas').text(gProteinas.toFixed(0));
        $('#tabelaDistribuicao_c2').text("Proteínas (" + gProteinas.toFixed(0) + "g)");
        $('#gramasKgProteinas').val(gkg.toFixed(1));
        calculoTotalNED();
    });
    $('#gramasKgProteinas').change(function () {
        var gramasKg = $('#gramasKgProteinas').val();
        gramasKg = parseFloat(gramasKg);
        var percProteinas = (72.3 * gramasKg * 4) * 100 / neds;
        var gProteinas = peso * gramasKg;
        if (percProteinas < 10) {
            $('#percProteinas').css('color', '#FF0000');
        } else if (percProteinas > 35) {
            $('#percProteinas').css('color', '#FF0000');
        } else {
            $('#percProteinas').css('color', 'black');
        }
        $('#percProteinas').val(percProteinas.toFixed(0));
        $('#tabelaDistribuicao_c2').text("Proteínas (" + gProteinas.toFixed(0) + "g)");
        $('#gramasProteinas').text(gProteinas.toFixed(0));
        calculoTotalNED();
    });

    $('#percLipidos').change(function () {
        var percLipidos = $('#percLipidos').val();
        if (percLipidos < 20) {
            $('#percLipidos').css('color', '#FF0000');
        } else if (percLipidos > 35) {
            $('#percLipidos').css('color', '#FF0000');
        } else {
            $('#percLipidos').css('color', 'black');
        }
        var gLipidos = (percLipidos / 100 * neds) / 9;
        $('#gramasLipidos').text(gLipidos.toFixed(0));
        $('#tabelaDistribuicao_c3').text("Lípidos (" + gLipidos.toFixed(0) + "g)");
        calculoTotalNED();
    });

    $('#percGlicidos').change(function () {
        var percGlicidos = $('#percGlicidos').val();
        if (percGlicidos < 45) {
            $('#percGlicidos').css('color', '#FF0000');
        } else if (percGlicidos > 65) {
            $('#percGlicidos').css('color', '#FF0000');
        } else {
            $('#percGlicidos').css('color', 'black');
        }
        var gGlicidos = (percGlicidos / 100 * neds) / 4;
        $('#gramasGlicidos').text(gGlicidos.toFixed(0));
        $('#tabelaDistribuicao_c4').text("H. Carbono (" + gGlicidos.toFixed(0) + "g)");
        calculoTotalNED();
    });

    var calculoTotalNED = function () {
        var percLipidos = $('#percLipidos').val();
        var percGlicidos = $('#percGlicidos').val();
        var percProteinas = $('#percProteinas').val();

        if (percGlicidos != "" && percLipidos != "" && percProteinas != "") {
            var Totalperc = parseInt(percGlicidos) + parseInt(percLipidos) + parseInt(percProteinas);
            console.log(Totalperc);
            $('#totalVet').text(Totalperc.toFixed(0) + '%');
            if (Totalperc > 100) {
                $('#totalVet').css('color', '#FF0000');
            } else if (Totalperc < 100) {
                $('#totalVet').css('color', '#FF0000');
            } else {
                $('#totalVet').css('color', 'black');
            }
        }
    };
});

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
var verificaDistMacroNutri = function () {
    var bool = true;
    $("#percProteinas, #percLipidos, #percGlicidos").each(function (index, val) {
        var perc = $(this).val();
        console.log($(this).attr('id') + ' ' + parseInt(perc));
        if (parseInt(perc) <= 0 || isNaN(parseInt(perc))) {
            bool = false;
        }
    });
    return bool;
};

var loadDoses = function(){

}

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
        if (!verificaDistMacroNutri()) {
            alert('Falta preencher a percentagem de macronutrientes');
            $(".editable-cancel").click();
            return;
        }
        setTimeout(function () {
            for (i in equivalencias) {
                alimento = equivalencias[i];
                if (i != 6 || i != 9 || i != 11 || i != 13) {
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

//          Associar valor das doses ao POST
    $('#btnSubmeter').click(function () {
        var iDose = 0; //indice do input da dose a preencher
        var temLeite = false;
        //precorrer todas as linhas da tabela
        $('#tabelaDistribuicao > table >tbody tr').each(function (i) {
            //salta as linhas dos subtotais
            if (i == 0 || i == 6 || i == 9 || i == 11 || i >= 13) {
                return;
            }
            //obtem a dose da linha i
            var dose = $('#tabelaDistribuicao > table >tbody tr:nth-child(' + i + ') >td:nth-child(2)').text();
            //se a dose de leite ja estiver definida
            //salta a linha atual se for uma linha de leite
            if ((i == 1 || i == 2 || i == 3) && temLeite) {
                return;
            }
            //ao encontrar dose de leite mete a flag a true
            if ((i == 1 || i == 2 || i == 3) && dose > 0) {
                temLeite = true;
            }

            if ((i >= 3 && !temLeite)) {
                iDose++;
                temLeite = true;
            } else if (temLeite) {
                iDose++;
            }

            //preenche o input com o valor da dose
            $('#dosesFields input:nth-child(' + iDose + ')').val(dose);
        });
    });
//          END --- Associar valor das doses ao POST
});

</script>


</div>







<?php echo TbHtml::formActions(array(
    TbHtml::button('Anterior', array('id' => 'btnAnterior')),
    TbHtml::submitButton('Próximo', array(
        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
        'id' => 'btnSubmeter')),

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
<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentarForm */

Yii::app()->clientScript->registerScriptFile(
    Yii::app()->baseUrl . '/js/PlanoAlimentarForm.js',
    CClientScript::POS_END
);

$this->breadcrumbs = array(
    $model->utenteNome => (Yii::app()->createUrl('utentes/view', array('id' => $model->utenteId))),
    'Novo plano alimentar', 'Passo 1', 'Passo 2',
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
    <input type="hidden" name="PlanoAlimentarForm[tipoLeite]" id="PlanoAlimentarForm_tipoLeite"
           value="<?php echo($model->tipoLeite); ?>">

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
                   id="PlanoAlimentarForm_dose_<?php echo($key) ?>" value="<?php echo $value ?>">
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

    </div>

    <?php echo TbHtml::formActions(array(
        TbHtml::button('Anterior', array('id' => 'btnAnterior')),
        TbHtml::submitButton('Próximo', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'id' => 'btnSubmeter')),

    )); ?>

    <?php $this->endWidget(); ?>
</div>


<script type="text/javascript">
var tipoLeite = '<?php echo $model->tipoLeite; ?>';

var calculoTotalNED = function () {
    var percLipidos = $('#percLipidos').val();
    var percGlicidos = $('#percGlicidos').val();
    var percProteinas = $('#percProteinas').val();

    if (percGlicidos != "" && percLipidos != "" && percProteinas != "") {
        var Totalperc = parseFloat(percGlicidos) + parseFloat(percLipidos) + parseFloat(percProteinas);
        console.log(Totalperc);
        $('#totalVet').text(Totalperc.toFixed(1) + '%');
        if (Totalperc > 100) {
            $('#totalVet').css('color', '#FF0000');
        } else if (Totalperc < 100) {
            $('#totalVet').css('color', '#FF0000');
        } else {
            $('#totalVet').css('color', 'black');
        }
    }
};

var calculoSubTotal = function (cInicio, cFim, lInicio, lFim) {
    for (colunas = cInicio; colunas <= cFim; colunas++) {
        calcSubTotal = 0;
        for (linhas = lInicio; linhas <= lFim; linhas++) {
            var doseColuna = $('#tabelaDistribuicao > table >tbody  tr:nth-child(' + linhas + ')>td:nth-child(' + colunas + ')').text();
            calcSubTotal = calcSubTotal + parseFloat(doseColuna);

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
        dosesPao = (parseFloat(totalHC) - parseFloat(subTotalHC)) / 15;
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
    var subTotalProteinas = $('#tabelaDistribuicao > table >tbody  tr:nth-child(9) >td:nth-child(3) ').text();
    console.log('SubTotalProteinas ',subTotalProteinas);
    var totalProteinas = $('#gramasProteinas').text();
    console.log("Total Proteinas ", totalProteinas);
    if (subTotalProteinas != 0) {
       var dosesProteinas = (parseFloat(totalProteinas) - parseFloat(subTotalProteinas)) / 7;
        console.log("valor carne", dosesProteinas);
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
        dosesGordura = (parseFloat(totalLipidos) - parseFloat(subTotalLipidos)) / 5;
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
        console.log($(this).attr('id') + ' ' + parseFloat(perc));
        if (parseFloat(perc) <= 0 || isNaN(parseFloat(perc))) {
            bool = false;
        }
    });
    return bool;
};

var countReloadDoses = 0;
var reloadPage = function () {

    $("#percProteinas, #percLipidos,#percGlicidos").trigger('change');

    $('div#tabelaDistribuicao tbody tr').each(function (iLinha) {
//        console.log("Linha da tabela ", iLinha);
        if (iLinha == 0 || iLinha == 5 || iLinha == 6 || iLinha == 10 || iLinha == 12) {
            return;
        }
        if (iLinha == 0 || iLinha == 1 || iLinha == 2) {
            if (iLinha != tipoLeite - 1) {
                return;
            }
        }
        countReloadDoses++;
//        console.log("doseField a obter : ", countReloadDoses);
        var doseGuardada = $('div#dosesFields input:nth-child(' + (countReloadDoses) + ')').val();
//        console.log("LinhaIndex:", iLinha, " Linha ", $(this).find('td:nth-child(1)').text(),
//            " Dose Guardada ", doseGuardada);
        $(this).find('td:nth-child(2) a').text(doseGuardada);
    });
    if (verificaDistMacroNutri()) {
        calcularTabelaDoses();
    }

};

var calcularTabelaDoses = function (changedIndex) {
    for (i in equivalencias) {
        alimento = equivalencias[i];
        if (i != 6 || i != 9 || i != 11 || i != 13) {
            var dose = $('#tabelaDistribuicao > table >tbody  tr:nth-child(' + i + ')>td:nth-child(2) a').text();
            for (j in alimento) {
                var nutrival = alimento[j];
                console.log("Dose:" ,dose,"Nutrival: ",nutrival);
                var calc = dose * nutrival;
                $('#tabelaDistribuicao > table >tbody  tr:nth-child(' + i + ') >td:nth-child(' + j + ')').text(calc);
            }
        }
    }
    calculoSubTotal(3, 6, 1, 5);
    if(changedIndex!=7 && changedIndex!=10 && changedIndex!=12){
        calcDosesPao();
    }
    calculoSubTotal(3, 6, 6, 8);
    if(changedIndex!=7 && changedIndex!=10 && changedIndex!=12){
        calcDosesCarne();
    }
    calculoSubTotal(3, 6, 9, 10);
    if(changedIndex!=7 && changedIndex!=10 && changedIndex!=12){
        calcDosesGordura();
    }
    calculoSubTotal(3, 6, 11, 12);
};

$(document).ready(function () {

    //DISTRIBUICAO DE NUTRIENTES
    var neds = $("#PlanoAlimentarForm_neds").val();
    var peso = 72.3;


    $('#tabelaDistribuicao > table >tbody  tr:nth-child(9) >td:nth-child(3) ').change(function(){
        console.log("Valor do subtotal da proteina ", $(this).text());
    });


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

    $("#percProteinas, #percLipidos,#percGlicidos").change(function(){
        if(verificaDistMacroNutri()){
            calcularTabelaDoses();
        }
    });

    // END DISTRIBUICAO DE NUTRIENTES

    //TABELA DAS DOSES

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

    //Se voltou a atras recarrega as doses definidas
    reloadPage();


    $('#tabelaDistribuicao > table >tbody tr>td:nth-child(2) ').change(function () {
        console.log("ocorreu uma mudaça de dose");
        if (!verificaDistMacroNutri()) {
            alert('Falta preencher a percentagem de macronutrientes');
            $(".editable-cancel").click();
            return;
        }
        var indiceLinha = $(this).find('a').attr("data-pk");
        setTimeout(function(){
            calcularTabelaDoses(indiceLinha);
        }, 150);

    });

    //Associar valor das doses ao POST
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
                tipoLeite = i;
                $('#PlanoAlimentarForm_tipoLeite').val(tipoLeite);
                console.log("Tipo leite: ", $('#PlanoAlimentarForm_tipoLeite').val());
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
    //END --- Associar valor das doses ao POST


});

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
<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentarForm */

Yii::app()->clientScript->registerScriptFile(
    Yii::app()->baseUrl . '/js/FormulasNutri.js',
    CClientScript::POS_END
);

Yii::app()->clientScript->registerScriptFile(
    Yii::app()->baseUrl . '/js/PlanoAlimentarForm.js',
    CClientScript::POS_END
);

$this->breadcrumbs = array(
    $model->utenteNome => (Yii::app()->createUrl('utentes/view', array('id' => $model->utenteId))),
    'Novo plano alimentar', 'Passo 1',
);



?>
<h4>Utente: <?php echo($model->utenteNome) ?></h4>
<h3>Cálculo das Necessidades Energéticas Diárias (NEDs) </h3>


<div id="formPlanoStep1">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id' => 'formPlanoAlimentar'
    )); ?>

    <!-- valores dos forms anteriores    -->
    <?php $this->renderPartial('create_hidden_field', array(
        'model' => $model,
        'passo' => 1
    ))?>
    <!--END valores dos forms anteriores    -->

    <fieldset>
        <legend>Situação Atual</legend>
        <div id="formPlanoStep1DadosAtuais">
            <?php echo $form->dropDownListControlGroup($model, 'actividade',
                $model->actividades, array('empty' => '---')); ?>
            <?php echo $form->uneditableFieldControlGroup($model, 'idade'); ?>
            <?php echo $form->textFieldControlGroup($model, 'pesoAtual'); ?>
            <?php echo $form->textFieldControlGroup($model, 'altura'); ?>
        </div>
        <div id="formPlanoStep1DadosAtuaisCalc">
            <?php echo TbHtml::label('Metabolismo Basal em Repouso', 'mbrVal'); ?>
            <?php echo TbHtml::uneditableField('-', array('id' => 'mbrVal')); ?>
            <?php echo TbHtml::label('IMC', 'imcVal'); ?>
            <?php echo TbHtml::uneditableField('-', array('id' => 'imcVal')); ?>
            <?php echo TbHtml::label('Categoria IMC', 'imcCatVal'); ?>
            <?php echo TbHtml::uneditableField('-', array('id' => 'imcCatVal')); ?>
            <?php echo TbHtml::label('Peso Referência', 'pesoRefVal'); ?>
            <?php echo TbHtml::uneditableField('-', array('id' => 'pesoRefVal')); ?>
            <?php echo TbHtml::label('Peso Ajustado', 'pesoAjustVal'); ?>
            <?php echo TbHtml::uneditableField('-', array('id' => 'pesoAjustVal')); ?>
            <?php echo TbHtml::label('NEDs atuais', 'nedsAtualVal'); ?>
            <?php echo TbHtml::uneditableField('-', array('id' => 'nedsAtualVal')); ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Terapeutica a aplicar</legend>
        <div id="formPlanoStep1DadosTerapeuticas">
            <?php echo $form->textFieldControlGroup($model, 'pesoAcordado'); ?>
            <?php echo $form->textFieldControlGroup($model, 'neds'); ?>
            <?php echo $form->textFieldControlGroup($model, 'restricaoNeds', array('help' => 'ATENÇÃO: IMC do utente requer restrição energética!')); ?>


        </div>
        <div id="formPlanoStep1DadosTerapeuticasCalc">
            <?php echo TbHtml::label('IMC', 'imcVal'); ?>
            <?php echo TbHtml::uneditableField('-', array('id' => 'imcTerVal')); ?>
            <?php echo TbHtml::label('Categoria IMC', 'imcCatTerVal'); ?>
            <?php echo TbHtml::uneditableField('-', array('id' => 'imcCatTerVal')); ?>
            <!--            --><?php //echo TbHtml::label('NEDs', 'nedsTerVal'); ?>
            <!--            --><?php //echo TbHtml::uneditableField('-', array('id' => 'nedsTerVal')); ?>

        </div>
    </fieldset>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton('Proximo', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'id' => 'btnSubmeter')),
    )); ?>

    <?php $this->endWidget(); ?>
</div>

<script type="text/javascript">

    /**
     * Obtem o valor de um input field e substitui "," por "." no input e devolve o valor
     * @param idInput id do input field (sem #)
     * @returns {string} valor substituido
     */
    var replaceAndGetCommaInput = function (idInput) {
        var value = $('#' + idInput).val();
        value = value.replace(',', '.');
        $('#' + idInput).val(value);
        return value;
    }

    var updateVals = function (peso, altura, sexo, idade, actividade) {
        console.log("updateVals", peso, altura, sexo, idade, actividade);
        var mbr = calcMetabolismoBasal(peso, altura, sexo, idade);
        console.log("MBR: " + mbr);
        $('#mbrVal').text(mbr.toFixed(0));
        var imc = calcIMC(peso, altura);
        console.log("IMC: " + imc);
        $('#imcVal').text(imc.toFixed(2));
        var catIMC = calcIMCCat(imc, idade);
        $('#imcCatVal').text(catIMC);

        if (imc <= 27) {
            $('#PlanoAlimentarForm_restricaoNeds ~ p').css('display', 'none');
            $('#PlanoAlimentarForm_restricaoNeds ~ p').css('color', '#FF0000');
        } else {
            $('#PlanoAlimentarForm_restricaoNeds ~ p').css('display', 'block');
        }
        var pesoRef = calcPesoRef(altura, sexo, idade);
        $('#pesoRefVal').text(pesoRef.toFixed(1) + ' Kg');
        $('#PlanoAlimentarForm_pesoAcordado').val(pesoRef.toFixed(1));
        if (imc > 30 || imc < 18) {
            console.log(peso, pesoRef, imc);
            var pesoAjust = calcPesoAjust(peso, pesoRef, imc);
            console.log("Peso ajustado: " + pesoAjust);
            $('#pesoAjustVal').text(pesoAjust + ' Kg');
            $('#pesoAjustVal, label[for="pesoAjustVal"] ').show();
            $('#PlanoAlimentarForm_pesoAcordado').val(pesoAjust.toFixed(1));

        } else {
            $('#pesoAjustVal, label[for="pesoAjustVal"] ').hide();
        }
        var neds = calcNeds(peso, altura, sexo, idade, actividade);
        console.log("NEDS: " + neds);
        $('#nedsAtualVal').text(neds.toFixed(0));


    }

    var updateVarsAndCalc = function (sexo, idade) {

        var peso = replaceAndGetCommaInput('PlanoAlimentarForm_pesoAtual');
        peso = parseFloat(peso);
        var altura = replaceAndGetCommaInput('PlanoAlimentarForm_altura');
        var actividade = $('#PlanoAlimentarForm_actividade').val();
        if (peso != 0 && altura != 0) {
            updateVals(peso, altura, sexo, idade, actividade);
        }


    };
    var nedsTer = 0;
    var calcTerapeutica = function (pesoAcordado, altura, sexo, idade, actividade) {
        isNedsDefault=true;

        var imc = calcIMC(pesoAcordado, altura);
        $('#imcTerVal').text(imc.toFixed(2));
        var catIMC = calcIMCCat(imc, idade);
        $('#imcCatTerVal').text(catIMC);

        var neds = calcNeds(pesoAcordado, altura, sexo, idade, actividade);
        nedsChanged=neds.toFixed(0);
        var nedsTer = neds.toFixed(0);
        $('#nedsTerVal').text(nedsTer);
        $('#PlanoAlimentarForm_neds').val(nedsTer);
        $('#PlanoAlimentarForm_restricaoNeds').val('');
    };

    var updateTerapeutica = function (sexo, idade) {
        if (idade != 0) {
            var pesoAcordado = $('#PlanoAlimentarForm_pesoAcordado').val();
            if (pesoAcordado == "") {
                return;
            }
            pesoAcordado = parseFloat(pesoAcordado);
            var altura = $('#PlanoAlimentarForm_altura').val();
            altura = parseFloat(altura);
            var actividade = $('#PlanoAlimentarForm_actividade').val();
            if (altura != 0 || actividade != "") {
                calcTerapeutica(pesoAcordado, altura, sexo, idade, actividade);
            }
        }

    };

    var isNedsDefault = true;
    var nedsChanged ;
    $(document).ready(function () {
        var sexo = '<?php echo($model->sexo) ?>';
        var idade = '<?php echo($model->idade) ?>';
        if (idade != 0) {
            updateVarsAndCalc(sexo, idade);
            updateTerapeutica(sexo, idade);
            $('#PlanoAlimentarForm_pesoAtual,#PlanoAlimentarForm_altura,#PlanoAlimentarForm_actividade ')
                .change(function () {
                    updateVarsAndCalc(sexo, idade);
                });
        }

        $('#PlanoAlimentarForm_pesoAcordado,#PlanoAlimentarForm_altura,#PlanoAlimentarForm_actividade ')
            .change(function () {
                updateTerapeutica(sexo, idade)
            });

        $('#PlanoAlimentarForm_restricaoNeds').change(function () {
            if (isNaN($(this).val())) {
                return;
            }
            var inputNeds = $('#PlanoAlimentarForm_neds');
            var restricao = $(this).val();
            var neds=nedsChanged;
//            if (isNedsDefault) {
//
//                var peso = replaceAndGetCommaInput('PlanoAlimentarForm_pesoAcordado');
//                peso = parseFloat(peso);
//                var altura = replaceAndGetCommaInput('PlanoAlimentarForm_altura');
//                var actividade = $('#PlanoAlimentarForm_actividade').val();
//                neds = calcNeds(peso, altura, sexo, idade, actividade);
//
//            }else{
//                neds = inputNeds.val();
//            }
            console.log("restricao: ", restricao, neds);
            inputNeds.val((neds - restricao).toFixed(0));

        });

        $('#PlanoAlimentarForm_neds').change(function(){
            $('#PlanoAlimentarForm_restricaoNeds').val('');
            isNedsDefault=false;
            nedsChanged= $(this).val();
        });

        var loadRestricao = '<?php echo $model->restricaoNeds?>'
        if(loadRestricao !=''){
            $('#PlanoAlimentarForm_restricaoNeds').val(loadRestricao);
            var input =$('#PlanoAlimentarForm_neds');
            var neds =  input.val();
            input.val(neds-loadRestricao);
        }
    });


</script>
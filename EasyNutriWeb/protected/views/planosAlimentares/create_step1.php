<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentarForm */

Yii::app()->clientScript->registerScriptFile(
    Yii::app()->baseUrl.'/js/FormulasNutri.js',
    CClientScript::POS_END
);

$this->breadcrumbs = array(
    'Planos Alimentares' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List PlanosAlimentares', 'url' => array('index')),
    array('label' => 'Manage PlanosAlimentares', 'url' => array('admin')),
);
?>

<h3>Cálculo das Necessidades Energéticas Diárias (NEDs) </h3>


<div id="formPlanoStep1">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    )); ?>



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
            <?php echo TbHtml::label('Metabolismo Basal em Reposo', 'mbrVal'); ?>
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
        <?php echo $form->textFieldControlGroup($model, 'restricaoNeds'); ?>


        </div>
        <div id="formPlanoStep1DadosTerapeuticasCalc">
            <?php echo TbHtml::label('IMC', 'imcVal'); ?>
            <?php echo TbHtml::uneditableField('-', array('id' => 'imcTerVal')); ?>
            <?php echo TbHtml::label('Categoria IMC', 'imcCatTerVal'); ?>
            <?php echo TbHtml::uneditableField('-', array('id' => 'imcCatTerVal')); ?>
<!--            --><?php //echo TbHtml::label('NEDs', 'nedsTerVal'); ?>
<!--            --><?php //echo TbHtml::uneditableField('-', array('id' => 'nedsTerVal')); ?>
            <input type="hidden" id="passoAtual" name="passoAtual" value="1">
            <input type="hidden" id="irPara" name="irPara" value="2" >
        </div>
    </fieldset>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton('Proximo', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>

    <?php $this->endWidget(); ?>
</div>

<script type="text/javascript">

    var updateVals = function (peso, altura, sexo, idade, actividade) {
        var mbr = calcMetabolismoBasal(peso, altura, sexo, idade);
        console.log("MBR: " + mbr);
        $('#mbrVal').text(mbr.toFixed(0));
        var imc = calcIMC(peso, altura);
        console.log("IMC: " + imc);
        $('#imcVal').text(imc.toFixed(2));
//       TODO calc imc cat;

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
        console.log("NEDS: "+neds);
        $('#nedsAtualVal').text(neds.toFixed(0));

    }

    var updateVarsAndCalc = function(sexo,idade){
        var peso = $('#PlanoAlimentarForm_pesoAtual').val();
        peso = parseFloat(peso);
        var altura = $('#PlanoAlimentarForm_altura').val();
        altura = parseFloat(altura);
        var actividade = $('#PlanoAlimentarForm_actividade').val();
        updateVals(peso, altura, sexo, idade, actividade);
    };

    var updateTerapeutica = function(pesoAcordado, altura, sexo,idade,actividade){
        var imc = calcIMC(pesoAcordado, altura);
        $('#imcTerVal').text(imc.toFixed(2));
        //       TODO calc imc cat;

        var neds = calcNeds(pesoAcordado, altura, sexo, idade, actividade);
        $('#nedsTerVal').text(neds.toFixed(0));
        $('#PlanoAlimentarForm_neds').val(neds.toFixed(0));
    }



    $(document).ready(function () {
        var sexo = '<?php echo($model->sexo) ?>';
        var idade = '<?php echo($model->idade) ?>';
        updateVarsAndCalc(sexo,idade);
        $('#PlanoAlimentarForm_pesoAtual,#PlanoAlimentarForm_altura,#PlanoAlimentarForm_actividade ')
            .change(function () {
                updateVarsAndCalc(sexo,idade);
            });
        $('#PlanoAlimentarForm_pesoAcordado,#PlanoAlimentarForm_altura,#PlanoAlimentarForm_actividade ')
            .change(function () {
                var pesoAcordado = $('#PlanoAlimentarForm_pesoAcordado').val();
                if(pesoAcordado == ""){
                    return;
                }
                pesoAcordado = parseFloat(pesoAcordado);
                var altura = $('#PlanoAlimentarForm_altura').val();
                altura = parseFloat(altura);
                var actividade = $('#PlanoAlimentarForm_actividade').val();
                updateTerapeutica(pesoAcordado,altura,sexo,idade,actividade);
            });
        $('#PlanoAlimentarForm_restricaoNeds').change(function(){
            var inputNeds = $('#PlanoAlimentarForm_neds');
            var restricao = $(this).val();
            var neds = inputNeds.val();
            console.log("restricao: ",restricao,neds);
            inputNeds.val(neds-restricao);
        });
    });


</script>
<?php
Yii::app()->clientScript->registerScriptFile(
    Yii::app()->baseUrl.'/js/PlanoAlimentarForm.js',
    CClientScript::POS_END
);

$this->breadcrumbs = array(
    'Passo 1','Passo 2', 'Passo 3','Passo 4',
);

?>

<h4>Utente: <?php echo($model->utenteNome)?></h4>
<h3>Plano Alimentar</h3>
<div id="formPlanoStep3">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id'=>'formPlanoAlimentar'
    )); ?>

    <!--valores do form anterior-->
    <input type="hidden" id="passoAtual" name="passoAtual" value="4">
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



    <div id="detalhesPlanoAlimentar">
        <p class="tipoRefeicao"><br><b>Refeição:</b> Pequeno-Almoço</p>

        <p class="horaRefeicao"><br><b>Hora: </b><?php echo $model->horasRefeicao['Pequeno-Almoco']?> </p>
        <?php
        $this->widget('editable.EditableField', array(
            'type' => 'text',
            'model' => $model,
            'attribute' => 'horasRefeicao["Pequeno-Almoco"]',
            //define value directly as it should match the format of combodate: Y-m-d H:i --> YYYY-MM-DD HH:mm
//            'value' => 'Pequeno-Almoço',
            'placement' => 'right',
//            'format' => 'HH:mm', //in this format date sent to server
//            'viewformat' => ' HH:mm', //in this format date is displayed
//            'template' => ' HH:mm', //template for dropdowns
        ));
        ?>

        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
            'name'=> 'alimentos',
            'source'=>$modelAlimentos,
        ));
        ?>


    </div>



    <?php echo TbHtml::formActions(array(
        TbHtml::button('Anterior',array('id'=>'btnAnterior')),
        TbHtml::submitButton('Guardar', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'id'=>'btnSubmeter')),

    )); ?>
    <?php $this->endWidget(); ?>
</div>
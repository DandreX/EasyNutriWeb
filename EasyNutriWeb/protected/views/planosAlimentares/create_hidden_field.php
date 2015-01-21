<?php
/* @var $model PlanosAlimentarForm */
/* @var $passo int */
?>
<div id="hidden-fields">

    <input type="hidden" id="passoAtual" name="passoAtual" value="<?php echo $passo ?>">
    <input type="hidden" id="irPara" name="irPara" value="<?php echo $passo + 1 ?>">

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

    <div id="dosesFields">
        <?php foreach ($model->doses as $key => $value): ?>
            <input type="hidden" name="PlanoAlimentarForm[doses][<?php echo($key) ?>]"
                   id="PlanoAlimentarForm_dose_<?php echo($key) ?>" value="<?php echo $value ?>">
        <?php endforeach; ?>
    </div>

    <?php foreach ($model->dosesDistribuidas as $key => $refeicao): ?>
        <?php foreach ($model->dosesDistribuidas[$key] as $keyMacro => $macroNutri): ?>
            <input type="hidden"
                   name="PlanoAlimentarForm[dosesDistribuidas][<?php echo $key ?>][<?php echo $keyMacro ?>]"
                   id="PlanoAlimentarForm_<?php echo $key ?>_<?php echo $keyMacro ?>"
                   value="<?php echo $macroNutri ?>"/>
        <?php endforeach; ?>
    <?php endforeach; ?>

    <?php if ($passo != 1): ?>
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
    <?php endif; ?>

    <?php if ($passo != 2): ?>
        <?php foreach ($model->distMacro as $key => $value): ?>
            <input type="hidden" name="PlanoAlimentarForm[distMacro][<?php echo $key ?>]"
                   value="<?php echo($value); ?>">
        <?php endforeach; ?>
    <?php endif; ?>


    <?php if ($passo != 4): ?>
        <?php foreach ($model->horasRefeicao as $i => $hora): ?>
            <input type="hidden" name="PlanoAlimentarForm[horasRefeicao][<?php echo $i ?>]" value="<?php echo $hora ?>">
        <?php endforeach; ?>

        <input type="hidden" id="PlanoAlimentarForm_prescricao" name="PlanoAlimentarForm[prescricao]"
               value="<?php echo($model->prescricao); ?>">
        <input type="hidden" id="PlanoAlimentarForm_verEquivalencias" name="PlanoAlimentarForm[verEquivalencias]"
               value="<?php echo($model->verEquivalencias); ?>">
    <?php endif; ?>

</div>
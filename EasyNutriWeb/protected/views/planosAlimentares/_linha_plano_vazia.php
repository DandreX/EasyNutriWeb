<?php
/* @var idRefeicao int*/
/* @var idLinha int*/
?>
<div class="linhaPlano">
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][quant]', ''); ?>
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][unidade]', ''); ?>
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][alimento]', ''); ?>

    <?php echo TbHtml::button('x',
        array(
            'class' => 'btnApagarLinha',
            'color' => TbHtml::BUTTON_COLOR_DANGER,
        )); ?>
    <br>
</div>
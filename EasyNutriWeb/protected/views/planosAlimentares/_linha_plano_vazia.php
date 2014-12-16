<?php
/* @var idRefeicao int */
/* @var idLinha int */
?>
<div class="linhaPlano">
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][quant]', '',
        array(
            'placeholder' => 'Quantidade',
            'class'=>'linhaPlanoQuantidade',
        )); ?>
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][unidade]', '',
        array(
            'placeholder' => 'Unidade',
            'class'=>'linhaPlanoUnidade',
        )); ?>
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][alimento]', '',
        array(
            'placeholder' => 'Alimento',
            'class'=>'linhaPlanoAlimento',
        )); ?>

    <?php echo TbHtml::button('x',
        array(
            'class' => 'btnApagarLinha',
            'color' => TbHtml::BUTTON_COLOR_DANGER,
        )); ?>
    <br>
</div>
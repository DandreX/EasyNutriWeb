<?php /* @var idRefeicao int*/?>
<div class="linhaPlano">
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][][quant]', ''); ?>
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][][unidade]', ''); ?>
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][][alimento]', ''); ?>

    <?php echo TbHtml::button('x',
        array(
            'class' => 'btnApagarLinha',
            'color' => TbHtml::BUTTON_COLOR_DANGER,
        )); ?>
    <br>
</div>
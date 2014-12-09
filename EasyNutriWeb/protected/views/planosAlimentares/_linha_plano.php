<?php
/* @var $alimento Alimento */
/* @var $idRefeicao int */
/* @var $porcoes Porcoes */
?>
<?php
$porcoes = CHtml::listData($porcoes, 'id', 'descricao');
ChromePhp::log($porcoes);
?>
<div class="linhaPlano">
    <input type="hidden" name="PlanoAlimentarForm[plano][<?php echo $idRefeicao;?>][][id]"
           value="<?php echo $alimento->id;?>">
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][][quant]', ''); ?>

    <?php if (empty($porcoes)): ?>
        <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][][unidade]',
            $alimento->unidade, array(
                'readonly' => true,
            )); ?>
    <?php else: ?>
        <?php echo TbHtml::dropDownList('PlanoAlimentarForm[plano][' . $idRefeicao . '][][unidade]', '',
            $porcoes); ?>
    <?php endif; ?>
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][][alimento]',
        $alimento->nome, array(
            'readonly' => true,
        )); ?>

    <?php echo TbHtml::button('x',
        array(
            'class' => 'btnApagarLinha',
            'color' => TbHtml::BUTTON_COLOR_DANGER,
        )); ?>
    <br>
</div>
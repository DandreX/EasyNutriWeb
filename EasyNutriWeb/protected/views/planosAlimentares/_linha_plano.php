<?php
/* @var $alimento Alimento */
/* @var $idRefeicao int */
/* @var $idLinha int */
/* @var $porcoes Porcoes */
?>
<?php
$porcoes = CHtml::listData($porcoes, 'id', 'descricao');

ChromePhp::log($porcoes);
?>
<div class="linhaPlano">
    <input type="hidden" name="PlanoAlimentarForm[plano][<?php echo $idRefeicao; ?>][<?php echo $idLinha; ?>][id]"
           value="<?php echo $alimento->id; ?>">
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][quant]',
        '',
        array(
            "placeholder"=>'Quantidade',
            'class'=>'linhaPlanoQuantidade',

        )); ?>

    <?php if (empty($porcoes)): ?>
        <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][unidade]',
            $alimento->unidade, array(
                'readonly' => true,
                "placeholder"=>'Unidade',
                'class'=>'linhaPlanoUnidade',
            )); ?>
    <?php else: ?>
        <?php $porcoes[$alimento->unidade] = $alimento->unidade; ?>
        <?php echo TbHtml::dropDownList('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][unidade]', '',
            $porcoes,
        array(
            'class'=>'linhaPlanoUnidade',
        )); ?>
    <?php endif; ?>
    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][alimento]',
        $alimento->nome, array(
            'readonly' => true,
            'placeholder'=>'Alimento',
            'class'=>'linhaPlanoAlimento',
        )); ?>

    <?php echo TbHtml::button('x',
        array(
            'class' => 'btnApagarLinha',
            'color' => TbHtml::BUTTON_COLOR_DANGER,
        )); ?>
    <br>

</div>


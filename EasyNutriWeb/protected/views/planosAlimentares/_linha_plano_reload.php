<?php
/* @var $alimento Alimento */
/* @var $idRefeicao int */
/* @var $idLinha int */
/* @var $porcoes Porcoes */
/* @var $refeicaoPlano Array */
?>
<?php
$fromDB = isset($alimento);
//ChromePhp::log($porcoes);
?>
<div class="linhaPlano">
    <?php if ($fromDB): ?>
        <input type="hidden" name="PlanoAlimentarForm[plano][<?php echo $idRefeicao; ?>][<?php echo $idLinha; ?>][id]"
               value="<?php echo $alimento->id; ?>">
    <?php endif; ?>

    <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][quant]',
        $refeicaoPlano['quant'],
        array(
            'placeholder'=>'Quantidade',
            'class'=>'linhaPlanoQuantidade',
        )
    ); ?>

    <?php if ($fromDB): ?>
        <?php
        $porcoes = CHtml::listData($porcoes, 'id', 'descricao');
        ?>
        <?php if (empty($porcoes)): ?>
            <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][unidade]',
                $alimento->unidade, array(
                    'readonly' => true,
                    'placeholder' => 'Unidade',
                    'class'=>'linhaPlanoUnidade',
                )); ?>
        <?php else: ?>
            <?php $porcoes[$alimento->unidade] = $alimento->unidade; ?>
            <?php echo TbHtml::dropDownList('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][unidade]', '',
                $porcoes,
                array(
                    'class'=>'linhaPlanoUnidade'
                )
            ); ?>
        <?php endif; ?>
    <?php else: ?>
        <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][unidade]',
            $refeicaoPlano["unidade"],
        array(
            'placeholder'=>'Unidade',
            'class'=>'linhaPlanoUnidade',
        )
        ); ?>
    <?php endif; ?>

    <?php if ($fromDB): ?>
        <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][alimento]',
            $alimento->nome, array(
                'readonly' => true,
                'class'=>'linhaPlanoAlimento',
            )); ?>
    <?php else: ?>
        <?php echo TbHtml::textField('PlanoAlimentarForm[plano][' . $idRefeicao . '][' . $idLinha . '][alimento]',
            $refeicaoPlano['alimento'],
            array(
             'placeholder'=>'Alimento',
                'class'=>'linhaPlanoAlimento',
            )
        ); ?>
    <?php endif; ?>
    <?php echo TbHtml::button('x',
        array(
            'class' => 'btnApagarLinha',
            'color' => TbHtml::BUTTON_COLOR_DANGER,
        )); ?>
    <br>
</div>
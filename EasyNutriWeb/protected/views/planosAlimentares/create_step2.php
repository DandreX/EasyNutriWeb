<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentarForm */

$this->breadcrumbs = array(
    'Planos Alimentares' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List PlanosAlimentares', 'url' => array('index')),
    array('label' => 'Manage PlanosAlimentares', 'url' => array('admin')),
);
?>

<h3>Distribuicao das NEDs por macronutrientes</h3>

<p><b>NEDs estipulados:</b> <?php echo($model->neds); ?> Kcal</p>

<div id="formPlanoStep2">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    )); ?>
    <div class="tabelaInput">
        <?php echo TbHtml::controlsRow(array(
            TbHtml::uneditableField('Variável', array('span' => 2)),
            TbHtml::uneditableField('Valor de Referência', array('span' => 3)),
            TbHtml::uneditableField('%VET', array('span' => 2)),
            TbHtml::uneditableField('Gramas/Kg', array('span' => 2)),
            TbHtml::uneditableField('Gramas', array('span' => 2)),
        )); ?>
        <?php echo TbHtml::controlsRow(array(
            TbHtml::uneditableField('Proteínas', array('span' => 2)),
            TbHtml::uneditableField('15%-35%', array('span' => 3)),
            TbHtml::textField('text', '', array('span' => 2, 'id'=>'percProteinas')),
            TbHtml::textField('text', '', array('span' => 2, 'id'=>'gramasKgProteinas')),
            TbHtml::textField('text', '', array('span' => 2, 'id'=>'gramasProteinas')),
        )); ?>
        <?php echo TbHtml::controlsRow(array(
            TbHtml::uneditableField('Lípidos', array('span' => 2)),
            TbHtml::uneditableField('20%-35%', array('span' => 3)),
            TbHtml::textField('text', '', array('span' => 2, 'id'=>'percLipidos')),
            TbHtml::uneditableField('-', array('span' => 2)),
            TbHtml::textField('text', '', array('span' => 2, 'id'=>'percLipidos')),
        )); ?>
        <?php echo TbHtml::controlsRow(array(
            TbHtml::uneditableField('Glícidos', array('span' => 2)),
            TbHtml::uneditableField('45%-60%', array('span' => 3)),
            TbHtml::textField('text', '', array('span' => 2, 'id'=>'percGlicidos')),
            TbHtml::uneditableField('-', array('span' => 2)),
            TbHtml::textField('text', '', array('span' => 2, 'id'=>'percGlicidos')),
        )); ?>
    </div>
    <div class="calculoDoses">
    <p><b><br>Cálculo das doses</br></b></p>
        <?php echo TbHtml::controlsRow(array(
            TbHtml::uneditableField('Alimentos', array('span' => 2)),
            TbHtml::uneditableField('Doses', array('span' => 2)),
            TbHtml::uneditableField('Proteinas', array('span' => 2)),
            TbHtml::uneditableField('Gordura', array('span' => 2)),
            TbHtml::uneditableField('Glicidos', array('span' => 2)),
            TbHtml::uneditableField('Calorias', array('span' => 2)),
        )); ?>
    </div>
    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton('Proximo', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>

    <?php $this->endWidget(); ?>
</div>
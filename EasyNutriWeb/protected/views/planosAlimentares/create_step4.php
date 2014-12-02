<?php
$this->breadcrumbs = array(
    'Planos Alimentares' => array('index'),
    'Create',
);

?>

<h4>Diario alimentar do dia</h4>

<?php
$this->menu = array(
    array('label' => 'List PlanosAlimentares', 'url' => array('index')),
    array('label' => 'Manage PlanosAlimentares', 'url' => array('admin')),
);
?>

<h3>Plano Alimentar</h3>
<div id="formPlanoStep3">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    )); ?>
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
        TbHtml::submitButton('Proximo', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    )); ?>
    <?php $this->endWidget(); ?>
</div>
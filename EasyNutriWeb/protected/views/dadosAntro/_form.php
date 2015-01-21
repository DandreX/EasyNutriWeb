<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */
/* @var $form CActiveForm */
?>

<div id="formDadosAntro">
    <div id="mensagemDadosAntro">
        <?php if ($mensagem != ""):
            echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, $mensagem);
        endif
        ?>
    </div>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id' => 'dadosAntro_form',
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php $utentes = CHtml::listData(Utentes::model()->findAllByAttributes(
            array(),
            $condition = 'medico_id=:userid',
            $params = array(
                ':userid'=>Yii::app()->user->userid,
            )
        ), 'id', 'nome');
        echo $form->dropDownListControlGroup($model, 'utente_id', $utentes,
            array('empty' => 'Escolha o Utente', 'order' => 'nome'));?>
    </div>

    <div class="row">
        <?php $medicoes = CHtml::listData(TipoMedicao::model()->findAll(), 'id', 'descricao');
        echo $form->dropDownListControlGroup($model, 'tipo_medicao_id', $medicoes,
            array('empty' => 'Escolha o tipo de medição', 'order' => 'descricao'));?>
    </div>

    <div class="row">
        <?php echo $form->textFieldControlGroup($model, 'valor'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'data_med', array('class' => 'control-label required')); ?>
        <?php
        $model->data_med = date('Y-m-d H:i');?>
        <div class="controls">
            <?php $form->widget('application.extensions.timepicker.timepicker', array(
                'model' => $model,
                'name' => 'data_med',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'timeFormat' => 'hh:mm',
                    'showOn' => 'focus',
                    'maxDate' => 'today',
                ),
            ));
            ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->textAreaControlGroup($model, 'observacoes', array('rows' => 4, 'cols' => 60)); ?>
    </div>
    <div class="form-actions">
        <?php echo TbHtml::button('Guardar', array('id'=>'btnGuardar', 'class'=>'btn btn-primary')); ?>
        <?php if($model->scenario != 'update'): ?>
        <?php echo TbHtml::button('Guardar e Criar Novo', array('id'=>'btnCriarNovo', 'class'=>'btn btn-primary')); ?>
        <?php endif ?>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$('#btnGuardar').click(function(){
    $('#dadosAntro_form').attr('action', '<?php echo Yii::app()->createUrl('dadosAntro/create') ?>');
    $('#dadosAntro_form').submit();
});
$('#btnCriarNovo').click(function(){
    $('#dadosAntro_form').attr('action', '<?php echo Yii::app()->createUrl('dadosAntro/createAndNew') ?>');
    $('#dadosAntro_form').submit();
});

$(document).ready(function () {
        setTimeout(function(){
            $('#mensagemDadosAntro').hide();
        },3500);

    }
);
</script>
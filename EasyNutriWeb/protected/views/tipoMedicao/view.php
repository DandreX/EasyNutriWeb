<?php
/* @var $this TipoMedicaoController */
/* @var $model TipoMedicao */

$this->breadcrumbs = array(
    'Tipo Medicao' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Lista Tipo Medicao', 'url' => array('index')),
    array('label' => 'Criar Tipo Medicao', 'url' => array('create')),
    array('label' => 'Alterar Tipo Medicao', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Apagar Tipo Medicao', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Gerir Tipo Medicao', 'url' => array('admin')),
);
?>

<h1>Tipo Medicao #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'descricao',
    ),
)); ?>

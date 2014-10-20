<?php
/* @var $this RefeicoesController */
/* @var $model Refeicoes */

$this->breadcrumbs = array(
    'Refeicoes' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Refeicoes', 'url' => array('index')),
    array('label' => 'Create Refeicoes', 'url' => array('create')),
    array('label' => 'Update Refeicoes', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Refeicoes', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Refeicoes', 'url' => array('admin')),
);
?>

<h1>View Refeicoes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'diario_id',
        'tipo_refeicao_id',
        'data_refeicao',
    ),
)); ?>

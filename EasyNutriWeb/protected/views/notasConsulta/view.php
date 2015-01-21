<?php
/* @var $this NotasConsultaController */
/* @var $model NotasConsulta */

$this->breadcrumbs = array(
    'Notas Consultas' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List NotasConsulta', 'url' => array('index')),
    array('label' => 'Create NotasConsulta', 'url' => array('create')),
    array('label' => 'Update NotasConsulta', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete NotasConsulta', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage NotasConsulta', 'url' => array('admin')),
);
?>

<h1>View NotasConsulta #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'descricao',
        'data',
        'utente_id',
        'medico_id',
    ),
)); ?>

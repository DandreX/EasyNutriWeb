<?php
/* @var $this NotasConsultaController */
/* @var $model NotasConsulta */

$this->breadcrumbs = array(
    'Notas Consultas' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List NotasConsulta', 'url' => array('index')),
    array('label' => 'Create NotasConsulta', 'url' => array('create')),
    array('label' => 'View NotasConsulta', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage NotasConsulta', 'url' => array('admin')),
);
?>

    <h1>Update NotasConsulta <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
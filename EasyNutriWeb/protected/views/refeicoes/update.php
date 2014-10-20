<?php
/* @var $this RefeicoesController */
/* @var $model Refeicoes */

$this->breadcrumbs = array(
    'Refeicoes' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Refeicoes', 'url' => array('index')),
    array('label' => 'Create Refeicoes', 'url' => array('create')),
    array('label' => 'View Refeicoes', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Refeicoes', 'url' => array('admin')),
);
?>

    <h1>Update Refeicoes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
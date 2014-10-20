<?php
/* @var $this RefeicoesController */
/* @var $model Refeicoes */

$this->breadcrumbs = array(
    'Refeicoes' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Refeicoes', 'url' => array('index')),
    array('label' => 'Manage Refeicoes', 'url' => array('admin')),
);
?>

    <h1>Create Refeicoes</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
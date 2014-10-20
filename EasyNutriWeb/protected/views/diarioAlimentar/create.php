<?php
/* @var $this DiarioAlimentarController */
/* @var $model DiarioAlimentar */

$this->breadcrumbs = array(
    'Diario Alimentars' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List DiarioAlimentar', 'url' => array('index')),
    array('label' => 'Manage DiarioAlimentar', 'url' => array('admin')),
);
?>

    <h1>Create DiarioAlimentar</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
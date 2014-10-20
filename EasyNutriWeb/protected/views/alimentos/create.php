<?php
/* @var $this AlimentosController */
/* @var $model Alimentos */

$this->breadcrumbs = array(
    'Alimentoses' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Alimentos', 'url' => array('index')),
    array('label' => 'Manage Alimentos', 'url' => array('admin')),
);
?>

    <h1>Create Alimentos</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
<?php
/* @var $this AlimentosController */
/* @var $model Alimentos */

$this->breadcrumbs = array(
    'Alimentoses' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Alimentos', 'url' => array('index')),
    array('label' => 'Create Alimentos', 'url' => array('create')),
    array('label' => 'View Alimentos', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Alimentos', 'url' => array('admin')),
);
?>

    <h1>Update Alimentos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
<?php
/* @var $this DiarioAlimentarController */
/* @var $model DiarioAlimentar */

$this->breadcrumbs = array(
    'Diario Alimentars' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List DiarioAlimentar', 'url' => array('index')),
    array('label' => 'Create DiarioAlimentar', 'url' => array('create')),
    array('label' => 'View DiarioAlimentar', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage DiarioAlimentar', 'url' => array('admin')),
);
?>

    <h1>Update DiarioAlimentar <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
<?php
/* @var $this DiarioAlimentarController */
/* @var $model DiarioAlimentar */

$this->breadcrumbs = array(
    'Diario Alimentars' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List DiarioAlimentar', 'url' => array('index')),
    array('label' => 'Create DiarioAlimentar', 'url' => array('create')),
    array('label' => 'Update DiarioAlimentar', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete DiarioAlimentar', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage DiarioAlimentar', 'url' => array('admin')),
);
?>

<h1>View DiarioAlimentar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'user_id',
        'data_diario',
    ),
)); ?>

<?php
/* @var $this AlimentosController */
/* @var $model Alimentos */

$this->breadcrumbs = array(
    'Alimentoses' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Alimentos', 'url' => array('index')),
    array('label' => 'Create Alimentos', 'url' => array('create')),
    array('label' => 'Update Alimentos', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Alimentos', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Alimentos', 'url' => array('admin')),
);
?>

<h1>View Alimentos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'nome',
        'kcal',
        'agua',
        'proteinas',
        'lipidos',
        'hidratos_carbono',
        'acucares',
        'fibras',
    ),
)); ?>

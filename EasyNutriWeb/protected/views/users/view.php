<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Utentes' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Lista Utentes', 'url' => array('index')),
    array('label' => 'Criar Utentes', 'url' => array('create')),
    array('label' => 'Alterar Utentes', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Apagar Utentes', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Gestao Utentes', 'url' => array('admin')),
);
?>

<h1>Utentes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'nome',
        'username',
        'password',
    ),
)); ?>

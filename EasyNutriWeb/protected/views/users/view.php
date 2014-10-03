<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Utilizadores' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Lista Utilizadores', 'url' => array('index')),
    array('label' => 'Criar Utilizadores', 'url' => array('create')),
    array('label' => 'Alterar Utilizadores', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Apagar Utilizadores', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Gestao Utilizadores', 'url' => array('admin')),
);
?>

<h1>Utilizadores #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'nome',
        'username',
        'password',
    ),
)); ?>

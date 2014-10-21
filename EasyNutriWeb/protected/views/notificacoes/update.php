<?php
/* @var $this NotificacoesController */
/* @var $model Notificacoes */

$this->breadcrumbs = array(
    'Notificacoes' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Notificacoes', 'url' => array('index')),
    array('label' => 'Create Notificacoes', 'url' => array('create')),
    array('label' => 'View Notificacoes', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Notificacoes', 'url' => array('admin')),
);
?>

    <h1>Update Notificacoes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
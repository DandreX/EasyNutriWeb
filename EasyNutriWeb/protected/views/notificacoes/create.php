<?php
/* @var $this NotificacoesController */
/* @var $model Notificacoes */

$this->breadcrumbs = array(
    'Notificacoes' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Listar Notificações', 'url' => array('index')),
    array('label' => 'Gerir Notificações', 'url' => array('admin')),
);
?>

    <h1>Criar Notificações</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
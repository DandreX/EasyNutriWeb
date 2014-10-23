<?php
/* @var $this NotificacoesController */
/* @var $model Notificacoes */

$this->breadcrumbs = array(
    'Notificacoes' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Listar Notificações', 'url' => array('index')),
    array('label' => 'Nova Notificação', 'url' => array('create'), 'active' => true),
);
?>

    <h1>Nova Notificação</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
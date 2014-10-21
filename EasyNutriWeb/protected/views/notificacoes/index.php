<?php
/* @var $this NotificacoesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Notificacoes',
);

$this->menu = array(
    array('label' => 'Criar Notificações', 'url' => array('create')),
    array('label' => 'Gerir Notificações', 'url' => array('admin')),
);
?>

<h1>Notificações</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>

<?php
/* @var $this NotificacoesController */
/* @var $dataProvider CActiveDataProvider */


$this->menu = array(
    array('label' => 'Listar Notificações', 'url' => array('index'), 'active' => true),
    array('label' => 'Nova Notificação', 'url' => array('create')),
);
?>

<h1>Notificações</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'sortableAttributes' => array('data', 'utente_id'),
)); ?>

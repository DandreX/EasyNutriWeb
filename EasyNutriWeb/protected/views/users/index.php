<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Utentes',
);

$this->menu = array(
    array('label' => 'Criar Utentes', 'url' => array('create')),
    array('label' => 'Gestao Utentes', 'url' => array('admin')),
);
?>

<h1>Utentes</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>

<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Utilizadores',
);

$this->menu = array(
    array('label' => 'Criar Utilizadores', 'url' => array('create')),
    array('label' => 'Gestao Utilizadores', 'url' => array('admin')),
);
?>

<h1>Utilizadores</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>

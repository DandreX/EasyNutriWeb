<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Utentes' => array('index'),
    'Criar',
);

$this->menu = array(
    array('label' => 'Lista Utentes', 'url' => array('index')),
    array('label' => 'Gestao Utentes', 'url' => array('admin')),
);
?>

    <h1>Criar Utentes</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
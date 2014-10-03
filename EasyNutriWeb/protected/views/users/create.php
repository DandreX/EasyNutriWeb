<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Utilizadores' => array('index'),
    'Criar',
);

$this->menu = array(
    array('label' => 'Lista Utilizadores', 'url' => array('index')),
    array('label' => 'Gestao Utilizadores', 'url' => array('admin')),
);
?>

    <h1>Criar Utilizadores</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
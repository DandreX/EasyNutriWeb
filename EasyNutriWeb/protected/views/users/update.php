<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Utilizadores' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Alterar',
);

$this->menu = array(
    array('label' => 'Lista Utilizadores', 'url' => array('index')),
    array('label' => 'Criar Utilizadores', 'url' => array('create')),
    array('label' => 'Vista Utilizadores', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Gestao Utilizadores', 'url' => array('admin')),
);
?>

    <h1>Alterar Utilizadores <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
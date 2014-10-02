<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Utentes' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Alterar',
);

$this->menu = array(
    array('label' => 'Lista Utentes', 'url' => array('index')),
    array('label' => 'Criar Utentes', 'url' => array('create')),
    array('label' => 'Vista Utentes', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Gestao Utentes', 'url' => array('admin')),
);
?>

    <h1>Alterar Utentes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
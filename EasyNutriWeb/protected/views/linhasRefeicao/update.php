<?php
/* @var $this LinhasRefeicaoController */
/* @var $model LinhasRefeicao */

$this->breadcrumbs = array(
    'Linhas Refeicaos' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List LinhasRefeicao', 'url' => array('index')),
    array('label' => 'Create LinhasRefeicao', 'url' => array('create')),
    array('label' => 'View LinhasRefeicao', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage LinhasRefeicao', 'url' => array('admin')),
);
?>

    <h1>Update LinhasRefeicao <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
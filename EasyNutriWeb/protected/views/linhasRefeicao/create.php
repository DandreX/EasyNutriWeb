<?php
/* @var $this LinhasRefeicaoController */
/* @var $model LinhasRefeicao */

$this->breadcrumbs = array(
    'Linhas Refeicaos' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List LinhasRefeicao', 'url' => array('index')),
    array('label' => 'Manage LinhasRefeicao', 'url' => array('admin')),
);
?>

    <h1>Create LinhasRefeicao</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
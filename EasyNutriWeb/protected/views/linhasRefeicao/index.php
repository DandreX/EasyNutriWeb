<?php
/* @var $this LinhasRefeicaoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Linhas Refeicaos',
);

$this->menu = array(
    array('label' => 'Create LinhasRefeicao', 'url' => array('create')),
    array('label' => 'Manage LinhasRefeicao', 'url' => array('admin')),
);
?>

<h1>Linhas Refeicaos</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>

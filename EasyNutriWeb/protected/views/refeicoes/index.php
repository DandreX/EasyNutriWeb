<?php
/* @var $this RefeicoesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Refeicoes',
);

$this->menu = array(
    array('label' => 'Create Refeicoes', 'url' => array('create')),
    array('label' => 'Manage Refeicoes', 'url' => array('admin')),
);
?>

<h1>Refeicoes</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>

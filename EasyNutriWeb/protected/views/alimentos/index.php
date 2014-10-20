<?php
/* @var $this AlimentosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Alimentoses',
);

$this->menu = array(
    array('label' => 'Create Alimentos', 'url' => array('create')),
    array('label' => 'Manage Alimentos', 'url' => array('admin')),
);
?>

<h1>Alimentoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>

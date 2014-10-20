<?php
/* @var $this DiarioAlimentarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Diario Alimentars',
);

$this->menu = array(
    array('label' => 'Create DiarioAlimentar', 'url' => array('create')),
    array('label' => 'Manage DiarioAlimentar', 'url' => array('admin')),
);
?>

<h1>Diario Alimentars</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>

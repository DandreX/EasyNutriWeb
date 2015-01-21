<?php
/* @var $this NotasConsultaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Notas Consultas',
);

$this->menu = array(
    array('label' => 'Create NotasConsulta', 'url' => array('create')),
    array('label' => 'Manage NotasConsulta', 'url' => array('admin')),
);
?>

<h1>Notas Consultas</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>

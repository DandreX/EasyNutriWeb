<?php
/* @var $this DadosAntroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Dados Antropométricos',
);

$this->menu = array(
    array('label' => 'Criar Dados Antropométricos', 'url' => array('create')),
    array('label' => 'Gerir Dados Antropométricos', 'url' => array('admin')),
);
?>

<h1>Dados Antropométricos</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>

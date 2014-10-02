<?php
/* @var $this TipoMedicaoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Tipo Medicao',
);

$this->menu = array(
    array('label' => 'Criar Tipo Medicao', 'url' => array('create')),
    array('label' => 'Gerir Tipo Medicao', 'url' => array('admin')),
);
?>

<h1>Tipo Medicao</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>

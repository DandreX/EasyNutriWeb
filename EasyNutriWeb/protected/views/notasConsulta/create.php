<?php
/* @var $this NotasConsultaController */
/* @var $model NotasConsulta */

$this->breadcrumbs = array(
    'Notas Consultas' => array('index'),
    'Criar Nota de Consulta',
);

$this->menu = array(
    array('label' => 'List NotasConsulta', 'url' => array('index')),
    array('label' => 'Manage NotasConsulta', 'url' => array('admin')),
);
?>

    <h1>Nova Nota de Consulta</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
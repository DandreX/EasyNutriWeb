<?php
/* @var $this TipoMedicaoController */
/* @var $model TipoMedicao */

$this->breadcrumbs = array(
    'Tipo Medicao' => array('index'),
    'Criar',
);

$this->menu = array(
    array('label' => 'Lista Tipo Medicao', 'url' => array('index')),
    array('label' => 'Gestao Tipo Medicao', 'url' => array('admin')),
);
?>

    <h1>Criar Tipo Medicao</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
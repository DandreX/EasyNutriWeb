<?php
/* @var $this TipoMedicaoController */
/* @var $model TipoMedicao */

$this->breadcrumbs = array(
    'Tipo Medicao' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Alterar',
);

$this->menu = array(
    array('label' => 'Lista Tipo Medicao', 'url' => array('index')),
    array('label' => 'Criar Tipo Medicao', 'url' => array('create')),
    array('label' => 'Ver Tipo Medicao', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Gerir Tipo Medicao', 'url' => array('admin')),
);
?>

    <h1>Alterar Tipo Medicao <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
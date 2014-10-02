<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */

$this->breadcrumbs = array(
    'Dados Antropométricos' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Alterar',
);

$this->menu = array(
    array('label' => 'Listar Dados Antropométricos', 'url' => array('index')),
    array('label' => 'Criar Dados Antropométricos', 'url' => array('create')),
    array('label' => 'Ver Dados Antropométricos', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Gerir Dados Antropométricos', 'url' => array('admin')),
);
?>

    <h1>Alterar Dados Antropométricos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
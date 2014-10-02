<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */

$this->breadcrumbs = array(
    'Dados Antropométricos' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Lista Dados Antropométricos', 'url' => array('index')),
    array('label' => 'Criar Dados Antropométricos', 'url' => array('create')),
    array('label' => 'Alterar Dados Antropométricos', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Apagar Dados Antropométricos', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Gerir Dados Antropométricos', 'url' => array('admin')),
);
?>

<h1>Dados Antropométricos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'user_id',
        'tipo_medicao_id',
        'valor',
        'data_med',
        'unidade',
    ),
)); ?>

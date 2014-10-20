<?php
/* @var $this LinhasRefeicaoController */
/* @var $model LinhasRefeicao */

$this->breadcrumbs = array(
    'Linhas Refeicaos' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List LinhasRefeicao', 'url' => array('index')),
    array('label' => 'Create LinhasRefeicao', 'url' => array('create')),
    array('label' => 'Update LinhasRefeicao', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete LinhasRefeicao', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage LinhasRefeicao', 'url' => array('admin')),
);
?>

<h1>View LinhasRefeicao #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'alimento_id',
        'quant',
        'refeicao_id',
    ),
)); ?>

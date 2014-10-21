<?php
/* @var $this NotificacoesController */
/* @var $model Notificacoes */

$this->breadcrumbs = array(
    'Notificacoes' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Listar Notificações', 'url' => array('index')),
    array('label' => 'Criar Notificações', 'url' => array('create')),
    array('label' => 'Atualizar Notificações', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Apagar Notificações', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Gerir Notificações', 'url' => array('admin')),
);
?>

<h1>Ver Notificações #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'medico_id',
        'utente_id',
        'descricao',
        'data',
        'assunto',
    ),
)); ?>

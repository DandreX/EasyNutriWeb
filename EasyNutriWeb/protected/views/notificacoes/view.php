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
);

?>

<div id="cabecalhoNotificacao">
    <p id="cabecalhoUtente"><b>Para: </b><?php echo $model->getNomeUtente() ?>  </p>

    <p id="cabecalhoData"><?php echo $model->data ?> </p>

    <p id="cabecalhoAssunto"><b>Assunto: </b><?php echo $model->assunto; ?> </p>
</div>
<div id="descricaoNotificacao">
    <p id="descNotificacao"> <?php echo $model->descricao ?></p>
</div>

<?php /*$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'label'=>'Utente',
            'value'=> CHtml::encode($model->getNomeUtente()),
        ),
        'descricao',
    ),
)); */
?>

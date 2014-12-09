<?php
/* @var $this UtentesController */
/* @var $model Utentes */
/* @var $modelDiarioAlimentar DiarioAlimentar */
/* @var $dpDadosAntro CActiveDataProvider */
/* @var $dpNotificacoes CActiveDataProvider */

$this->menu = array(
    //array('label'=>'List Utentes', 'url'=>array('index')),
    array('label' => 'Meus Utentes', 'url' => array('admin')),
    array('label' => 'Novo Utente', 'url' => array('create')),
);

?>
<?php echo TbHtml::button('Enviar notificação', array(
    'id' =>'btnEnviarNotificacao',
    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
    'size' => TbHtml::BUTTON_SIZE_DEFAULT,
    'data-toggle' => 'modal',
    'data-target' => '#ModalNotificacao',
)); ?>
<?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'ModalNotificacao',
    'header' => 'Nova Notificação',
    'content' => '',
    'footer' => array(
        TbHtml::button('Enviar Notificação',
            array('id' => 'btnCreate',
                'data-dismiss' => 'modal',
                'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Cancelar', array(
            'id' => 'btnCancelar',
            'color' => TbHtml::BUTTON_COLOR_DANGER,
            'data-dismiss' => 'modal')),
    ),
)); ?>

<h2><?php echo $model->nome;?></h2>

<?php echo TbHtml::tabbableTabs(array(
    array('label' => 'Perfil', 'active' => 'true', 'content' => $this->renderPartial('_form',
            array('model' => $model
            ),
            true)),
    array('label' => 'Ficha Clínica', 'content' => $this->renderPartial('_ficha_clinica',
            array('model' => $model,
                'modelFichaClinica' => $modelFichaClinica,
            ),

            true)),
    array('label' => 'Diário Alimentar', 'content' => $this->renderPartial('_diario_alimentar_utentes',
            array('model' => $model,
                'dataProvider' => $dataProvider,
                'datasDiario' => $dataDiario,
            ),
            true)),
    array('label' => 'Plano Alimentar', 'content' => $this->renderPartial('_plano_alimentar',
            array('model' => $model,

            ),

            true)),

    array('label' => 'Dados Antro.', 'content' => $this->renderPartial('_dados_antro',array(
            'dpDadosAntro'=>$dpDadosAntro,
            'model'=>$model,
            //'graficos'=>$graficos,
        ),true)),
    array('label' => 'Notificações', 'content' => $this->renderPartial('_notificacoes',
            array('dpNotificacoes' => $dpNotificacoes,
            ),
            true)),

))?>

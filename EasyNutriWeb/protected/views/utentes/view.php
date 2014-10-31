<?php
/* @var $this UtentesController */
/* @var $model Utentes */
/* @var $modelDiarioAlimentar DiarioAlimentar */

$this->menu = array(
    //array('label'=>'List Utentes', 'url'=>array('index')),
    array('label' => 'Meus Utentes', 'url' => array('admin')),
    array('label' => 'Novo Utente', 'url' => array('create')),
);

?>

<h2>Perfil de <?php echo $model->nome; ?></h2>

<?php echo TbHtml::tabbableTabs(array(
    array('label' => 'Dados Pessoais', 'active' => 'true', 'content' => $this->renderPartial('_dados_utente',
            array('model' => $model
            ),
            true)),
    array('label' => 'Diário Alimentar', 'content' => $this->renderPartial('_diario_alimentar_utentes',
            array('model' => $model,
                'dataProvider' => $dataProvider,
            ),
            true)),
    array('label' => 'Notificações', 'content' => $this->renderPartial('_notificacoes',
            array('dpNotificacoes' => $dpNotificacoes,
            ),
            true)),
))?>



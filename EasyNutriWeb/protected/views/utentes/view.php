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

<h2><?php echo $model->nome; ?></h2>

<?php echo TbHtml::tabbableTabs(array(
    array('label' => 'Perfil', 'active' => 'true', 'content' => $this->renderPartial('_dados_utente',
            array('model' => $model
            ),
            true)),
    array('label' => 'Diário Alimentar', 'content' => $this->renderPartial('_diario_alimentar_utentes',
            array('model' => $model,
                'dataProvider' => $dataProvider,
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



<?php
/* @var $this UtentesController */
/* @var $model Utentes */

$this->breadcrumbs=array(
    'Utentes' => array('index'),
    $model->nome,
);

$this->menu=array(
    array('label' => 'List Utentes', 'url' => array('index')),
    array('label' => 'Create Utentes', 'url' => array('create')),
    array('label' => 'Update Utentes', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Utentes', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Utentes', 'url' => array('admin')),
);
?>

<h2>Perfil de <?php echo $model->nome; ?></h2>

<?php echo TbHtml::tabbableTabs(array(
    array('label' => 'Dados Pessoais', 'active' => 'true', 'content' => $this->renderPartial('_dados_utente', array('model' => $model), true)),
    array('label' => 'Diário Alimentar', 'content' => $this->renderPartial('_diario_alimentar_utentes', array('model' => $model), true)),
))?>



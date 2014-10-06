<?php
/* @var $this TipoMedicaoController */
/* @var $model TipoMedicao */

//$this->breadcrumbs = array(
//    'Tipo Medicao' => array('index'),
//    'Criar',
//);

$this->menu = array(
//    array('label' => 'Lista Tipo Medicao', 'url' => array('index')),
    array('label' => 'Todos os parâmetros', 'url' => array('admin')),
);
?>

    <h1>Novo parâmetro</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */

$this->breadcrumbs = array(
    'Dados Antropométricos' => array('index'),
    'Criar',
);

$this->menu = array(
    array('label' => 'Lista Dados Antropométricos', 'url' => array('index')),
    array('label' => 'Gerir Dados Antropométricos', 'url' => array('admin')),
);
?>

    <h1>Criar Dados Antropométricos</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
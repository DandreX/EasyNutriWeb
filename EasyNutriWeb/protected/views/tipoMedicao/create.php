<?php
/* @var $this TipoMedicaoController */
/* @var $model TipoMedicao */

//$this->breadcrumbs = array(
//    'Tipo Medicao' => array('index'),
//    'Criar',
//);

$this->menu = array(
//    array('label' => 'Lista Tipo Medicao', 'url' => array('index')),
    array('label' => 'Todos os registos', 'url' => array('dadosAntro/admin')),
    array('label' => 'Novo registo', 'url' => array('dadosAntro/create')),
    array('label' => 'Novo Parâmetro Antropométrico', 'url' => array('create'), 'active' => true)

);
?>

    <h1>Novo Parâmetro Antropométrico</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
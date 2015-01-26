<?php
/* @var $this DadosAntroController */
/* @var $model DadosAntro */

$this->breadcrumbs=array(
    'Utentes'=>array('utentes/admin'),
	'Dados Antropométricos'=>array('index'),

);
if(isset($model->utente_id)){
    $this->breadcrumbs[$model->utente->nome]=array('utentes/view&id='.$model->utente_id);
}
array_push($this->breadcrumbs,'Novo registo');

$this->menu = array(
//	array('label'=>'List DadosAntro', 'url'=>array('index')),

    array('label' => 'Todos os registos', 'url' => array('admin')),
    array('label' => 'Novo registo', 'url' => array('create'), 'active' => true),
    array('label' => 'Novo Parâmetro Antropométrico', 'url' => array('tipoMedicao/create'))
);
?>

    <h1>Novo Registo Antropométrico</h1>

<?php $this->renderPartial('_form', array('model' => $model, 'mensagem'=>$mensagem)); ?>
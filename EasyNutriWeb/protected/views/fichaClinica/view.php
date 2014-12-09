<?php
/* @var $this FichaClinicaController */
/* @var $model FichaClinica */

$this->breadcrumbs=array(
	'Ficha Clinicas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FichaClinica', 'url'=>array('index')),
	array('label'=>'Create FichaClinica', 'url'=>array('create')),
	array('label'=>'Update FichaClinica', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FichaClinica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FichaClinica', 'url'=>array('admin')),
);
?>

<h1>View FichaClinica #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'peso_nascenca',
		'peso_minimo',
		'peso_maximo',
		'peso_habitual',
		'tent_perda_peso',
		'antec_familiares',
		'antec_pessoais',
		'patologias',
		'alergias_alim',
		'intol_alim',
		'problem_digestao',
		'transito_intestinal',
		'habitos_toxicos',
		'medic_suplem_alim',
		'idUtente',
	),
)); ?>

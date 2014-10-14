<?php
/* @var $this UtentesController */
/* @var $model Utentes */

$this->breadcrumbs=array(
	'Utentes'=>array('index'),
	$model->nome,
);

$this->menu=array(
	array('label'=>'List Utentes', 'url'=>array('index')),
	array('label'=>'Create Utentes', 'url'=>array('create')),
	array('label'=>'Update Utentes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Utentes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Utentes', 'url'=>array('admin')),
);
?>

<h1>Perfil de <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
        'nome',
        'data_nascimento',
        'sexo',
        'estado_civil',
        'profissao',
        'morada',
		'username',
//		'password',
        'email',
		'telefone',
		'nif',
		'motivo_consulta',
//        'medicoNome',
    ),
)); ?>

<?php
/* @var $this PlanosAlimentaresController */
/* @var $model PlanosAlimentares */
/* @var $dpLinhasPlano LinhasPlano*/

$this->breadcrumbs=array(
	'Planos Alimentares'=>array('index'),
	$model->Id,
);


$this->menu=array(
	array('label'=>'List PlanosAlimentares', 'url'=>array('index')),
	array('label'=>'Create PlanosAlimentares', 'url'=>array('create')),
	array('label'=>'Update PlanosAlimentares', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete PlanosAlimentares', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlanosAlimentares', 'url'=>array('admin')),
);
?>

<h1> Plano Alimentar de <?php echo $model->idUtente->nome ?></h1>
    <div id="propriedadesPlanoAlimentar">
        <div id="dataPrescricao">
            <?php echo TbHtml::label('Data Prescrição', 'text'); ?>
            <?php echo TbHtml::uneditableField(''.$model->data_presc); ?>
        </div>
        <div id="apresentaTabela">
            <?php echo TbHtml::checkBox('apresentaTabela',($model->apresentaTabela == 1)?true:false, array('label' => 'Apresenta Tabela','disabled'=> true)); ?>
        </div>
    </div>
<?php
$this->widget('ext.groupgridview.GroupGridView', array(
    'id' => 'grid1',
    'dataProvider' => $dpLinhasPlano,
    'mergeColumns' => array('refeicao', 'hora'),
    'columns' => array(
//        array(
//            'value'=>'getRefeicao',
//            'header'=>'Refeicao',
//        ),
        'refeicao',
        'hora',
        'descricao',


//        array(
//            'value'=>'idAlimento->nome',
//            'header'=>'Alimento'
//        ),

        array('class' => 'CButtonColumn'),
    ),
));
?>
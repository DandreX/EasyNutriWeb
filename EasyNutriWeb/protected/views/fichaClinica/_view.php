<?php
/* @var $this FichaClinicaController */
/* @var $data FichaClinica */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_nascenca')); ?>:</b>
	<?php echo CHtml::encode($data->peso_nascenca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_minimo')); ?>:</b>
	<?php echo CHtml::encode($data->peso_minimo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_maximo')); ?>:</b>
	<?php echo CHtml::encode($data->peso_maximo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_habitual')); ?>:</b>
	<?php echo CHtml::encode($data->peso_habitual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tent_perda_peso')); ?>:</b>
	<?php echo CHtml::encode($data->tent_perda_peso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('antec_familiares')); ?>:</b>
	<?php echo CHtml::encode($data->antec_familiares); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('antec_pessoais')); ?>:</b>
	<?php echo CHtml::encode($data->antec_pessoais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patologias')); ?>:</b>
	<?php echo CHtml::encode($data->patologias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alergias_alim')); ?>:</b>
	<?php echo CHtml::encode($data->alergias_alim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intol_alim')); ?>:</b>
	<?php echo CHtml::encode($data->intol_alim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('problem_digestao')); ?>:</b>
	<?php echo CHtml::encode($data->problem_digestao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transito_intestinal')); ?>:</b>
	<?php echo CHtml::encode($data->transito_intestinal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('habitos_toxicos')); ?>:</b>
	<?php echo CHtml::encode($data->habitos_toxicos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('medic_suplem_alim')); ?>:</b>
	<?php echo CHtml::encode($data->medic_suplem_alim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUtente')); ?>:</b>
	<?php echo CHtml::encode($data->idUtente); ?>
	<br />

	*/ ?>

</div>
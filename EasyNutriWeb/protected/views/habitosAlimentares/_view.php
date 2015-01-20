<?php
/* @var $this HabitosAlimentaresController */
/* @var $data HabitosAlimentares */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_local_comp_ref')); ?>:</b>
	<?php echo CHtml::encode($data->hora_local_comp_ref); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metod_culin_comum')); ?>:</b>
	<?php echo CHtml::encode($data->metod_culin_comum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ing_doce_alim_gordo')); ?>:</b>
	<?php echo CHtml::encode($data->ing_doce_alim_gordo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ing_hidrica_diaria')); ?>:</b>
	<?php echo CHtml::encode($data->ing_hidrica_diaria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activ_fisica')); ?>:</b>
	<?php echo CHtml::encode($data->activ_fisica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUtente')); ?>:</b>
	<?php echo CHtml::encode($data->idUtente); ?>
	<br />


</div>
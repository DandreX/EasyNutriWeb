<?php
/* @var $this PlanosAlimentaresController */
/* @var $data PlanosAlimentares */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_utente')); ?>:</b>
	<?php echo CHtml::encode($data->id_utente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_medico')); ?>:</b>
	<?php echo CHtml::encode($data->id_medico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_presc')); ?>:</b>
	<?php echo CHtml::encode($data->data_presc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ned')); ?>:</b>
	<?php echo CHtml::encode($data->ned); ?>
	<br />


</div>
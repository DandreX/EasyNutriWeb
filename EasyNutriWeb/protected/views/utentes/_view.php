<?php
/* @var $this UtentesController */
/* @var $data Utentes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('morada')); ?>:</b>
	<?php echo CHtml::encode($data->morada); ?>
	<br />


</div>
<?php
/* @var $this AlimentosController */
/* @var $data Alimentos */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
    <?php echo CHtml::encode($data->nome); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('kcal')); ?>:</b>
    <?php echo CHtml::encode($data->kcal); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('agua')); ?>:</b>
    <?php echo CHtml::encode($data->agua); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('proteinas')); ?>:</b>
    <?php echo CHtml::encode($data->proteinas); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('lipidos')); ?>:</b>
    <?php echo CHtml::encode($data->lipidos); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('hidratos_carbono')); ?>:</b>
    <?php echo CHtml::encode($data->hidratos_carbono); ?>
    <br/>

    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('acucares')); ?>:</b>
	<?php echo CHtml::encode($data->acucares); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fibras')); ?>:</b>
	<?php echo CHtml::encode($data->fibras); ?>
	<br />

	*/
    ?>

</div>
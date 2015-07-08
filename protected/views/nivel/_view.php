<?php
/* @var $this NivelController */
/* @var $data Nivel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idNivel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idNivel), array('view', 'id'=>$data->idNivel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nivel')); ?>:</b>
	<?php echo CHtml::encode($data->nivel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuota')); ?>:</b>
	<?php echo CHtml::encode($data->cuota); ?>
	<br />


</div>
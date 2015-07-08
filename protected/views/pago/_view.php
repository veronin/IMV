<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idPago')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPago),array('view','id'=>$data->idPago)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRecibo')); ?>:</b>
	<?php echo CHtml::encode($data->idRecibo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serie')); ?>:</b>
	<?php echo CHtml::encode($data->serie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMedioPago')); ?>:</b>
	<?php echo CHtml::encode($data->idMedioPago); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />

	*/ ?>

</div>
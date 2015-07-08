<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idItemRecibo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idItemRecibo),array('view','id'=>$data->idItemRecibo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRecibo')); ?>:</b>
	<?php echo CHtml::encode($data->idRecibo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMatricula')); ?>:</b>
	<?php echo CHtml::encode($data->idMatricula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pago')); ?>:</b>
	<?php echo CHtml::encode($data->pago); ?>
	<br />


</div>
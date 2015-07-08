<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRecibo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRecibo),array('view','id'=>$data->idRecibo)); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuenta')); ?>:</b>
	<?php echo CHtml::encode($data->idCuenta); ?>
        <?php echo CHtml::encode($data->idCuenta0->idCliente0->idPersona0->getFullName()); ?> 
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaEmision')); ?>:</b>
	<?php echo CHtml::encode($data->fechaEmision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaCobroCompleto')); ?>:</b>
	<?php echo CHtml::encode($data->fechaCobroCompleto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('concepto')); ?>:</b>
	<?php echo CHtml::encode($data->concepto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importePendiente')); ?>:</b>
	<?php echo CHtml::encode($data->importePendiente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mes')); ?>:</b>
	<?php echo CHtml::encode($data->mes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciclo')); ?>:</b>
	<?php echo CHtml::encode($data->ciclo); ?>
	<br />
       
</div>
<!-- LISTADO DE ALUMNOS INDIVIDUAL -->

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAlumno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idAlumno),array('view','id'=>$data->idAlumno)); ?>
	<?php echo CHtml::encode($data->idPersona0->getFullName()); ?> 
        <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPersona')); ?>:</b>
	<?php echo CHtml::encode($data->idPersona); ?>
        
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('legajo')); ?>:</b>
	<?php echo CHtml::encode($data->legajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lua')); ?>:</b>
	<?php echo CHtml::encode($data->lua); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Padre')); ?>:</b>
	<?php echo CHtml::encode($data->idPadre0 ? $data->idPadre0->getFullName() : ""); ?>

	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Madre')); ?>:</b>
	<?php echo CHtml::encode($data->idMadre0 ? $data->idMadre0->getFullName() : ""); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tutor')); ?>:</b>
	<?php echo CHtml::encode($data->idTutor0 ? $data->idTutor0->getFullName() : ""); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idCliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreCompleto')); ?>:</b>
	<?php echo CHtml::encode($data->nombreCompleto); ?>
	<br />

	*/ ?>

</div>
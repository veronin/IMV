<div class="view">
    <?php
    /*@var $data Matricula */
    ?>

		<b><?php echo CHtml::encode($data->getAttributeLabel('idMatricula')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idMatricula),array('view','id'=>$data->idMatricula)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAlumno')); ?>:</b>
	<?php echo CHtml::encode($data->idAlumno); ?>
	<br />
    <b>
	<?php echo CHtml::encode($data->idAlumno0->idPersona0->getFullName()); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaInicio')); ?>:</b>
	<?php echo CHtml::encode($data->fechaInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaFin')); ?>:</b>
	<?php echo CHtml::encode($data->fechaFin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivoBaja')); ?>:</b>
	<?php echo CHtml::encode($data->motivoBaja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCurso')); ?>:</b>
	<?php echo CHtml::encode($data->idCurso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formaPago')); ?>:</b>
	<?php echo CHtml::encode($data->formaPago); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('medioPago')); ?>:</b>
	<?php echo CHtml::encode($data->medioPago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuenta')); ?>:</b>
	<?php echo CHtml::encode($data->idCuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDescuento')); ?>:</b>
	<?php echo CHtml::encode($data->idDescuento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciclo')); ?>:</b>
	<?php echo CHtml::encode($data->ciclo); ?>
	<br />

	*/ ?>

</div>
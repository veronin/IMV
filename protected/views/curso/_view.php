<?php
/* @var $this CursoController */
/* @var $data Curso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCurso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCurso), array('view', 'id'=>$data->idCurso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idNivel')); ?>:</b>
	<?php echo CHtml::encode($data->idNivel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaInicio')); ?>:</b>
	<?php echo CHtml::encode($data->fechaInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaFin')); ?>:</b>
	<?php echo CHtml::encode($data->fechaFin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cupoAlumnos')); ?>:</b>
	<?php echo CHtml::encode($data->cupoAlumnos); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cantAlumnos')); ?>:</b>
	<?php echo CHtml::encode($data->cantAlumnos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seccion')); ?>:</b>
	<?php echo CHtml::encode($data->seccion); ?>
	<br />

	*/ ?>

</div>
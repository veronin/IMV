<?php
/* @var $this CursoController */
/* @var $model Curso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'curso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idNivel'); ?>
		<?php echo $form->textField($model,'idNivel'); ?>
		<?php echo $form->error($model,'idNivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaInicio'); ?>
		<?php echo $form->textField($model,'fechaInicio'); ?>
		<?php echo $form->error($model,'fechaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaFin'); ?>
		<?php echo $form->textField($model,'fechaFin'); ?>
		<?php echo $form->error($model,'fechaFin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cupoAlumnos'); ?>
		<?php echo $form->textField($model,'cupoAlumnos'); ?>
		<?php echo $form->error($model,'cupoAlumnos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantAlumnos'); ?>
		<?php echo $form->textField($model,'cantAlumnos'); ?>
		<?php echo $form->error($model,'cantAlumnos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seccion'); ?>
		<?php echo $form->textField($model,'seccion',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'seccion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
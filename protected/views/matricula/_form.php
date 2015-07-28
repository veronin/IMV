<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'matricula-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->labelEx($model, 'idAlumno');?>
	<?php echo $form->dropDownList($model,'idAlumno',CHtml::listData(Alumno::model()->findAll(array('order'=>'idAlumno')),'idAlumno', 'nombreCompleto'),array('empty'=>'Seleccionar..' ));?>


        <?php echo $form->labelEx($model, 'Cuenta');?>
	<?php echo $form->dropDownList($model,'idCuenta',CHtml::listData(Persona::model()->findAll(array('order'=>'idPersona')),'idPersona', 'apellido', 'nombre'),array('empty'=>'Seleccionar..' ));?>

	<?php echo $form->datepickerRow($model,'fechaInicio',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

	<?php echo $form->datepickerRow($model,'fechaFin',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

	<?php echo $form->textFieldRow($model,'motivoBaja',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->labelEx($model,'idCurso'); ?>
        <?php echo $form->dropDownList($model,'idCurso',CHtml::listData(Curso::model()->findAll(array('order'=>'idCurso')),'idCurso', 'descripcion'),array('empty'=>'Seleccionar..' ));?>
	
        <?php echo $form->labelEx($model,'Descuento'); ?>
        <?php echo $form->dropDownList($model,'idDescuento',CHtml::listData(Descuento::model()->findAll(array('order'=>'idDescuento')),'idDescuento', 'descripcion'),array('empty'=>'Seleccionar..' ));?>
	
        <?php echo $form->textFieldRow($model,'ciclo',array('maxlength'=>5)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>

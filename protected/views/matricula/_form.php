<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'matricula-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>


        <?php echo $form->labelEx($model, 'id');?>
	<?php echo $form->dropDownList($model,'idCuenta',CHtml::listData(Persona::model()->findAll(array('order'=>'idPersona')),'idPersona', 'apellido', 'nombre'),array('empty'=>'Seleccionar..' ));?>

	<?php echo $form->datepickerRow($model,'fechaInicio',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

	<?php echo $form->datepickerRow($model,'fechaFin',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

	<?php echo $form->textFieldRow($model,'motivoBaja',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'idCurso',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'formaPago',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'medioPago',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'idCuenta',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'idDescuento',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ciclo',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>

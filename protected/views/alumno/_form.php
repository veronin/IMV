<!-- FORMULARIO DE CREACION/MODIF ALUMNO -->

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'alumno-form',
	'enableAjaxValidation'=>false,
)); 

?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>
        <?php echo $form->labelEx($model, 'idPersona');?>
	<?php echo $form->dropDownList($model,'idPersona',CHtml::listData(Persona::model()->findAll(array('order'=>'idPersona')),'idPersona', 'apellido', 'nombre'),array('empty'=>'Seleccionar..' ));?>

	<?php echo $form->textFieldRow($model,'legajo',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'lua',array('class'=>'span5')); ?>

        <?php echo $form->labelEx($model, 'idPadre');?>
	<?php echo $form->dropDownList($model,'idPadre',CHtml::listData(Persona::model()->findAll(array('order'=>'idPersona')),'idPersona', 'apellido', 'nombre'),array('empty'=>'Seleccionar..' ));?>

        <?php echo $form->labelEx($model, 'idMadre');?>
	<?php echo $form->dropDownList($model,'idMadre',CHtml::listData(Persona::model()->findAll(array('order'=>'idPersona')),'idPersona', 'apellido', 'nombre'),array('empty'=>'Seleccionar..' ));?>
        
        <?php echo $form->labelEx($model, 'idTutor');?>
	<?php echo $form->dropDownList($model,'idTutor',CHtml::listData(Persona::model()->findAll(array('order'=>'idPersona')),'idPersona', 'apellido', 'nombre'),array('empty'=>'Seleccionar..' ));?>

	<?php echo $form->labelEx($model, 'idCliente');?>
	<?php echo $form->dropDownList($model,'idCliente',CHtml::listData(Persona::model()->findAll(array('order'=>'idPersona')),'idPersona', 'apellido', 'nombre'),array('empty'=>'Seleccionar..' ));?>

	<?php echo $form->textFieldRow($model,'nombreCompleto')?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>

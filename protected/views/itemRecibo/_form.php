<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'item-recibo-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Campos con  <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'idRecibo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'importe',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'idMatricula',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pago',array('class'=>'span5','maxlength'=>1)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>

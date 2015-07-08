<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pago-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Campos con II <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'idRecibo',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'fecha',array( 'setEnabled' => false)); ?>

	<?php echo $form->textFieldRow($model,'numero',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'serie',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'importe',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'idMedioPago',array('class'=>'span5')); ?>
        
	<?php echo $form->textFieldRow($model,'idUsuario',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>

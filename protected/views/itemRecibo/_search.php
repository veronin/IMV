<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'idItemRecibo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idRecibo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'importe',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idMatricula',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'pago',array('class'=>'span5','maxlength'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'idPago',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idRecibo',array('class'=>'span5')); ?>

		<?php echo $form->datepickerRow($model,'fecha',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

		<?php echo $form->textFieldRow($model,'numero',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'serie',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'importe',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idMedioPago',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idUsuario',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

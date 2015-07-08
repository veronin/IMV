<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'idMatricula',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idAlumno',array('class'=>'span5')); ?>

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
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

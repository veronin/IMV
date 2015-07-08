<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'idPersona',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'dni',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'cuil',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'apellido',array('class'=>'span5','maxlength'=>45)); ?>

		<?php /* echo $form->textFieldRow($model,'sexo',array('class'=>'span5','maxlength'=>1)); ?>

		<?php echo $form->textFieldRow($model,'lugarNac',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->datepickerRow($model,'fechaNac',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

		<?php echo $form->textFieldRow($model,'grupoSang',array('class'=>'span5','maxlength'=>4)); ?>

		<?php echo $form->textFieldRow($model,'dirCalle',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'dirNro',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idLocalidad',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'celular',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'profesion',array('class'=>'span5','maxlength'=>45)); */?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'idUsuario',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'clave',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'legajo',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'area',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'ocupacion',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'idPersona',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

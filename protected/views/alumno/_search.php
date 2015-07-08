<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'idAlumno',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idPersona',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'legajo',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'lua',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idPadre',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idMadre',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idTutor',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'idCliente',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'nombreCompleto',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

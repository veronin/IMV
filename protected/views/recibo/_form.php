<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'recibo-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

        
        <?php echo $form->labelEx($model, 'idCuenta');?>
	<?php echo $form->dropDownList($model,'idCuenta',CHtml::listData(Cuenta::model()->findAll(array('order'=>'idCuenta')), 'idCuenta', 'idCliente'),array('empty'=>'Seleccionar..' ));?>


        <?php echo $form->textFieldRow($model,'ciclo',array('ciclo'=>date('YYYY')));?>
     
	<?php echo $form->textFieldRow($model,'fechaEmision', array('fechaEmision'=>date('dd-mm-yy'))) ?>
        <?php echo $form->textFieldRow($model,'fechaCobroCompleto') ?>
	
	<?php echo $form->dropDownList($model, 'concepto', array('CUOTA' => 'Cuota Mensual', 'MATRICULA' => 'Matricula Año Lectivo')); ?>

        <?php echo $form->dropDownList($model, 'mes', CHtml::listData(Meses::model()->findAll(array('order'=>'idMes')),'idMes', 'nombre'),array('empty'=>'Seleccionar..' ));?>

	<?php echo $form->textFieldRow($model,'importePendiente',array('class'=>'span2')); ?>      

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
    
</div> 
 <?php $this->endWidget(); ?>       

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'persona-form',
    'enableAjaxValidation' => false,
        ));
?>


<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'dni', array('class' => 'medium', 'style' => 'height:30px', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'cuil', array('class' => 'span5', 'style' => 'height:30px','maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'style' => 'height:30px','maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'apellido', array('class' => 'span5', 'style' => 'height:30px','maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'sexo', array('class' => 'span5', 'style' => 'height:30px','maxlength' => 1)); ?>

<?php echo $form->textFieldRow($model, 'lugarNac', array('class' => 'span5', 'style' => 'height:30px','maxlength' => 45)); ?>
<?php
echo $form->textFieldRow($model, 'xfechaNac', array('class' => 'span3','style' => 'height:30px',
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
        'attribute' => 'xfechaNac',
        'language' => 'es',
        // additional javascript options for the date picker plugin
        'options' => array(
            'showAnim' => 'fold',
        ),
        'htmlOptions' => array(
            'style' => 'height:20px;'
        ),
            ), true)))
?>
<?php echo $form->textFieldRow($model, 'grupoSang', array('class' => 'span5', 'style' => 'height:30px','maxlength' => 4)); ?>

<?php echo $form->textFieldRow($model, 'dirCalle', array('class' => 'span5', 'style' => 'height:30px','maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'dirNro', array('class' => 'span5', 'style' => 'height:30px',)); ?>

<?php echo $form->textFieldRow($model, 'idLocalidad', array('class' => 'span5', 'style' => 'height:30px',)); ?>

<?php echo $form->labelEx($model,'telefono');
$this->widget('CMaskedTextField', array(
    'model' => $model,
    'attribute' => 'telefono',
    'mask' => '(99999)-999999',
    'htmlOptions' => array('size' => 11,)
));
?>
<?php echo $form->textFieldRow($model, 'celular', array('class' => 'span5', 'style' => 'height:30px','maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'style' => 'height:30px','maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'profesion', array('class' => 'span5', 'style' => 'height:30px','maxlength' => 45)); ?>
<!--<button ng-click="count = count + 1">Click Me!</button>

<p>{{ count }}</p> -->
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Crear' : 'Guardar',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>


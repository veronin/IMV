<?php
$this->breadcrumbs=array(
	'Recibos'=>array('index'),
	$model->idRecibo,
);

$this->menu=array(
array('label'=>'Listar Recibo','url'=>array('index')),
array('label'=>'Crear Recibo','url'=>array('create')),
//array('label'=>'Cobrar Recibo','url'=>array('update','id'=>$model->idRecibo)),
array('label'=>'Borrar Recibo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idRecibo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Recibo','url'=>array('admin')),

);
?>

<h1>Ver Recibo #<?php echo $model->idRecibo; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idRecibo',
		'fechaEmision',
		'fechaCobroCompleto',
		'concepto',
		'importePendiente',
		'mes',
		'ciclo',
		'idCuenta',
                array(
                'name'=>'Padre',
                'value'=>$model->idCuenta0->idCliente0->idPersona0->nombre,
                'type'=>'text'),    
                 
),
));?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(

'dataProvider'=>new CActiveDataProvider('ItemRecibo', array('data'=>$model->itemRecibos)),

'columns'=>array(
                array(
                    'name'=>'idItemRecibo',
                    'header'=>'Nro.',
                    'htmlOptions'=>array('width'=>'60'),
                    ),
		array(
                    'name'=>'idMatricula',
                    'header'=>'Matricula Nro.',
                    'htmlOptions'=>array('width'=>'100'),
                    ),
                array(
                    'name'=>'Curso',
                    'header'=>'Curso',
                    'type'=>'raw',
                    'value'=>'$data->idMatricula0->idCurso0->getName()',
                    'htmlOptions'=>array('width'=>'100'),
                    ),
                array(
                    'name'=>'Alumno',
                    'header'=>'Alumno',
                    'type'=>'raw',
                    'value'=>'$data->idMatricula0->idAlumno0->idPersona0->getFullName()',
                    'htmlOptions'=>array('width'=>'300'),
                    ),
		'importe',
),
)); ?>

<!-- CREACION DE PAGO (FACTURA) -->

<div>
    
<!-- Si el importe pendiente es 0 no muestro para generar PAGO -->

<?php if ($model->importePendiente !== 0) {


    $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
            'id'=>'final-form',
            'action'=>$this->createUrl('/pago/create', array("id"=>$model->idRecibo)),
            'enableAjaxValidation'=>false,
            'enableClientValidation'=>false,
            'clientOptions'=>array(
            'validateOnSubmit'=>false,
             )  
        )); 
        if($model->fechaCobroCompleto == null){
                $this->widget('bootstrap.widgets.TbButton', array(
                 'label'=>'Registrar PAGO CUOTA '. $model->mes.'/'.$model->ciclo,
                 'type'=>'success',
                 'buttonType'=>'submit',
                 ));
                }?>

<?php $this->endWidget();
}?>
 </div>


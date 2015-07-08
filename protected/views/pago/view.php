<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->idPago,
);

$this->menu=array(
array('label'=>'Listar Pago','url'=>array('index')),
array('label'=>'Imprimir Pago','url'=>array('Imprimir','id'=>$model->idPago)),
array('label'=>'Modificar Pago','url'=>array('update','id'=>$model->idPago)),
array('label'=>'Borrar Pago','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idPago),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Pago','url'=>array('admin')),
);
?>

<h1>Ver Pago #<?php echo $model->idPago; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idPago',
		'idRecibo',
		'fecha',
		'numero',
		'serie',
		'importe',
		'idMedioPago',
		'idUsuario',
                'idRecibo0.idCuenta0.idCliente0.idPersona0.apellido'
),
)); ?>

<?php
$this->breadcrumbs=array(
	'Item Recibos'=>array('index'),
	$model->idItemRecibo,
);

$this->menu=array(
array('label'=>'Listar ItemRecibo','url'=>array('index')),
array('label'=>'Crear ItemRecibo','url'=>array('create')),
array('label'=>'Modificar ItemRecibo','url'=>array('update','id'=>$model->idItemRecibo)),
array('label'=>'Borrar ItemRecibo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idItemRecibo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar ItemRecibo','url'=>array('admin')),
);
?>

<h1>Ver ItemRecibo #<?php echo $model->idItemRecibo; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idItemRecibo',
		'idRecibo',
		'importe',
		'idMatricula',
		'pago',
),
)); ?>

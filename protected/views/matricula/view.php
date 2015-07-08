<?php
$this->breadcrumbs=array(
	'Matriculas'=>array('index'),
	$model->idMatricula,
);

$this->menu=array(
array('label'=>'Listar Matricula','url'=>array('index')),
array('label'=>'Crear Matricula','url'=>array('create')),
array('label'=>'Modificar Matricula','url'=>array('update','id'=>$model->idMatricula)),
array('label'=>'Borrar Matricula','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idMatricula),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Matricula','url'=>array('admin')),
);
?>

<h1>Ver Matricula #<?php echo $model->idMatricula; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idMatricula',
		'idAlumno',
		'fechaInicio',
		'fechaFin',
		'motivoBaja',
		'idCurso',
		'formaPago',
		'medioPago',
		'idCuenta',
		'idDescuento',
		'ciclo',
),
)); ?>

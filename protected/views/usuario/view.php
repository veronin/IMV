<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->idUsuario,
);

$this->menu=array(
array('label'=>'Listar Personal','url'=>array('index')),
array('label'=>'Crear Personal','url'=>array('create')),
array('label'=>'Modificar Personal','url'=>array('update','id'=>$model->idUsuario)),
array('label'=>'Borrar Personal','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idUsuario),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Personal','url'=>array('admin')),
);
?>

<h1>Ver Personal #<?php echo $model->idUsuario; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idUsuario',
		'nombre',
		'clave',
		'legajo',
		'area',
		'ocupacion',
		'idPersona',
),
)); ?>

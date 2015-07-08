<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->idCurso,
);

$this->menu=array(
	array('label'=>'Listar Curso', 'url'=>array('index')),
	array('label'=>'Crear Curso', 'url'=>array('create')),
	array('label'=>'Modificar Curso', 'url'=>array('update', 'id'=>$model->idCurso)),
	array('label'=>'Borrar Curso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCurso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Curso', 'url'=>array('admin')),
);
?>

<h1>Ver Curso #<?php echo $model->idCurso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCurso',
		'codigo',
		'descripcion',
		'idNivel',
		'fechaInicio',
		'fechaFin',
		'cupoAlumnos',
		'cantAlumnos',
		'seccion',
	),
)); ?>

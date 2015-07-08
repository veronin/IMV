<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Curso', 'url'=>array('index')),
	array('label'=>'Administrar Curso', 'url'=>array('admin')),
);
?>

<h1>Crear Curso</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->idCurso=>array('view','id'=>$model->idCurso),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Curso', 'url'=>array('index')),
	array('label'=>'Crear Curso', 'url'=>array('create')),
	array('label'=>'Ver Curso', 'url'=>array('view', 'id'=>$model->idCurso)),
	array('label'=>'Administrar Curso', 'url'=>array('admin')),
);
?>

<h1>Modificar Curso <?php echo $model->idCurso; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
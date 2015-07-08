<?php
$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	$model->idAlumno=>array('view','id'=>$model->idAlumno),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Alumno','url'=>array('index')),
	array('label'=>'Crear Alumno','url'=>array('create')),
	array('label'=>'Ver Alumno','url'=>array('view','id'=>$model->idAlumno)),
	array('label'=>'Administrar Alumno','url'=>array('admin')),
	);
	?>

	<h1>Modificar Alumno <?php echo $model->idAlumno; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
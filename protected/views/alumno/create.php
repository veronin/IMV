<?php
$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Alumno','url'=>array('index')),
array('label'=>'Administrar Alumno','url'=>array('admin')),
);
?>

<h1>Create Alumno</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
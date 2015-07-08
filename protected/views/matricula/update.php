<?php
$this->breadcrumbs=array(
	'Matriculas'=>array('index'),
	$model->idMatricula=>array('view','id'=>$model->idMatricula),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Matricula','url'=>array('index')),
	array('label'=>'Crear Matricula','url'=>array('create')),
	array('label'=>'Ver Matricula','url'=>array('view','id'=>$model->idMatricula)),
	array('label'=>'Administrar Matricula','url'=>array('admin')),
	);
	?>

	<h1>Modificar Matricula <?php echo $model->idMatricula; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
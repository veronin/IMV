<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->idUsuario=>array('view','id'=>$model->idUsuario),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Personal','url'=>array('index')),
	array('label'=>'Crear Personal','url'=>array('create')),
	array('label'=>'Ver Personal','url'=>array('view','id'=>$model->idUsuario)),
	array('label'=>'Administrar Personal','url'=>array('admin')),
	);
	?>

	<h1>Modificar Personal <?php echo $model->idUsuario; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
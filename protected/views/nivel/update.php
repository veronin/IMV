<?php
/* @var $this NivelController */
/* @var $model Nivel */

$this->breadcrumbs=array(
	'Nivels'=>array('index'),
	$model->idNivel=>array('view','id'=>$model->idNivel),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Nivel', 'url'=>array('index')),
	array('label'=>'Crear Nivel', 'url'=>array('create')),
	array('label'=>'Ver Nivel', 'url'=>array('view', 'id'=>$model->idNivel)),
	array('label'=>'Administrar Nivel', 'url'=>array('admin')),
);
?>

<h1>Modificar Nivel <?php echo $model->idNivel; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
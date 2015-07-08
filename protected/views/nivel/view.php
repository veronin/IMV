<?php
/* @var $this NivelController */
/* @var $model Nivel */

$this->breadcrumbs=array(
	'Nivels'=>array('index'),
	$model->idNivel,
);

$this->menu=array(
	array('label'=>'Listar Nivel', 'url'=>array('index')),
	array('label'=>'Crear Nivel', 'url'=>array('create')),
	array('label'=>'Modificar Nivel', 'url'=>array('update', 'id'=>$model->idNivel)),
	array('label'=>'Borrar Nivel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idNivel),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Nivel', 'url'=>array('admin')),
);
?>

<h1>Ver Nivel #<?php echo $model->idNivel; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idNivel',
		'nivel',
		'descripcion',
		'cuota',
	),
)); ?>

<?php
/* @var $this NivelController */
/* @var $model Nivel */

$this->breadcrumbs=array(
	'Nivels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Nivel', 'url'=>array('index')),
	array('label'=>'Administrar Nivel', 'url'=>array('admin')),
);
?>

<h1>Crear Nivel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
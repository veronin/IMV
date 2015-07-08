<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Personal','url'=>array('index')),
array('label'=>'Administrar Personal','url'=>array('admin')),
);
?>

<h1>Crear Personal</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
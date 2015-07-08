<?php
$this->breadcrumbs=array(
	'Matriculas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Matricula','url'=>array('index')),
array('label'=>'Administrar Matricula','url'=>array('admin')),
);
?>

<h1>Crear Matricula</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
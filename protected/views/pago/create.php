<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Pago','url'=>array('index')),
array('label'=>'Administrar Pago','url'=>array('admin')),
);
?>

<h1>Crear Pago ACA</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
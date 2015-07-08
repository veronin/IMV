<?php
$this->breadcrumbs=array(
	'Recibos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Recibo','url'=>array('index')),
array('label'=>'Administrar Recibo','url'=>array('admin')),
);
?>

<h1>Crear Recibo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
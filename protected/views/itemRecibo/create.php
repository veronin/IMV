<?php
$this->breadcrumbs=array(
	'Item Recibos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar ItemRecibo','url'=>array('index')),
array('label'=>'Administrar ItemRecibo','url'=>array('admin')),
);
?>

<h1>Crear ItemRecibo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
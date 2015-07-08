<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->idPago=>array('view','id'=>$model->idPago),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Pago','url'=>array('index')),
	//array('label'=>'Create Pago','url'=>array('create')),
	array('label'=>'Ver Pago','url'=>array('view','id'=>$model->idPago)),
	array('label'=>'Administrar Pago','url'=>array('admin')),
	);
	?>

	<h1>Modificar Pago !! <?php echo $model->idPago; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
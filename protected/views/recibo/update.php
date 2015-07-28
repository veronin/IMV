<?php
$this->breadcrumbs=array(
	'Recibos'=>array('index'),
	$model->idRecibo=>array('view','id'=>$model->idRecibo),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Recibo','url'=>array('index')),
	array('label'=>'Crear Recibo','url'=>array('create')),
	array('label'=>'Ver Recibo','url'=>array('view','id'=>$model->idRecibo)),
	array('label'=>'Administrar Recibo','url'=>array('admin')),
	);
	?>

	<h1>Modificar Recibo Nro.<?php echo $model->idRecibo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
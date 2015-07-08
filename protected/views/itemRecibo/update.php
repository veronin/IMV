<?php
$this->breadcrumbs=array(
	'Item Recibos'=>array('index'),
	$model->idItemRecibo=>array('view','id'=>$model->idItemRecibo),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar ItemRecibo','url'=>array('index')),
	array('label'=>'Crear ItemRecibo','url'=>array('create')),
	array('label'=>'Ver ItemRecibo','url'=>array('view','id'=>$model->idItemRecibo)),
	array('label'=>'Administrar ItemRecibo','url'=>array('admin')),
	);
	?>

	<h1>Modificar ItemRecibo <?php echo $model->idItemRecibo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
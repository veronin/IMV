<?php
$this->breadcrumbs=array(
	'Pagos',
);

$this->menu=array(
//array('label'=>'Create Pago','url'=>array('create')),
array('label'=>'Administrar Pago','url'=>array('admin')),
);
?>

<h1>Pagos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

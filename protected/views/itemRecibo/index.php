<?php
$this->breadcrumbs=array(
	'Item Recibos',
);

$this->menu=array(
array('label'=>'Crear ItemRecibo','url'=>array('create')),
array('label'=>'Administrar ItemRecibo','url'=>array('admin')),
);
?>

<h1>Item Recibos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

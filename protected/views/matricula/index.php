<?php
$this->breadcrumbs=array(
	'Matriculas',
);

$this->menu=array(
array('label'=>'Crear Matricula','url'=>array('create')),
array('label'=>'Administrar Matricula','url'=>array('admin')),
);
?>

<h1>Matriculas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

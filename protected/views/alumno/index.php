<?php
$this->breadcrumbs=array(
	'Alumnos',
);

$this->menu=array(
array('label'=>'Crear Alumno','url'=>array('create')),
array('label'=>'Administrar Alumno','url'=>array('admin')),
);
?>

<h1>Alumnos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

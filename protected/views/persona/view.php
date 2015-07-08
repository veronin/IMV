<?php
$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->idPersona,
);

$this->menu=array(
array('label'=>'List Persona','url'=>array('index')),
array('label'=>'Create Persona','url'=>array('create')),
array('label'=>'Update Persona','url'=>array('update','id'=>$model->idPersona)),
array('label'=>'Delete Persona','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idPersona),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Persona','url'=>array('admin')),
);
?>

<h3>Persona: <?php echo $model->idPersona; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idPersona',
		'dni',
		'cuil',
		'nombre',
		'apellido',
		'sexo',
		'lugarNac',
		'fechaNac',
		'grupoSang',
		'dirCalle',
		'dirNro',
		'idLocalidad',
		'telefono',
		'celular',
		'email',
		'profesion',
),
)); ?>

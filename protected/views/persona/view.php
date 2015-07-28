<?php
$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->idPersona,
);
if(Yii::app()->user->hasFlash('success')):?>
    <script>alert('<?php echo Yii::app()->user->getFlash('success'); ?>');</script>
    <?php endif;

$this->menu=array(
array('label'=>'Listar Persona','url'=>array('index')),
array('label'=>'Crear Persona','url'=>array('create')),
array('label'=>'Modificar Persona','url'=>array('update','id'=>$model->idPersona)),
array('label'=>'Borrar Persona','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idPersona),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Persona','url'=>array('admin')),
);
?>

<h3>Persona: <?php echo $model->apellido; ?></h3>

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
		'xfechaNac',
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

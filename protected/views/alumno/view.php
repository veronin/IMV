<?php
$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	$model->idAlumno,
);

$this->menu=array(
array('label'=>'Listar Alumno','url'=>array('index')),
array('label'=>'Crear Alumno','url'=>array('create')),
array('label'=>'Modificar Alumno','url'=>array('update','id'=>$model->idAlumno)),
array('label'=>'Borrar Alumno','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idAlumno),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Alumno','url'=>array('admin')),
);
?>

<h3>Alumno: <?php echo $model->idAlumno . " - " . $model->idPersona0->getFullName() ; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idAlumno',
                array(
                'type'=>'raw',
                'label'=>'id',    
                'value'=>CHtml::link(CHtml::encode($model->idPersona),
                         array('persona/view','id'=>$model->idPersona)), 
                    ),
                array(
                 'name'=>'Nombre del Alumno',
                 'value'=>$model->idPersona0->getFullName(), 
                 ),
                
		'legajo',
		'lua',
		
                array(
                'name'=>'Padre',
                'value'=>$model->idPadre0 ? $model->idPadre0->getFullName() : "",
                'type'=>'text'),    
		 array(
                 'name'=>'Teléfono Padre',
                 'value'=>$model->idPadre0 ? $model->idPadre0->celular : "",
                 ),
                array(
                'name'=>'Madre',
                'value'=>$model->idMadre0 ? $model->idMadre0->nombre : "",
                'type'=>'text'),    

                array(
                'name'=>'Tutor',
                'value'=>$model->idTutor0 ? $model->idTutor0->nombre : "",
                'type'=>'text'),    
              
		'idCliente',
               
		
),
)); ?>

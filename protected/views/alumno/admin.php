<?php
$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Alumno','url'=>array('index')),
array('label'=>'Create Alumno','url'=>array('create')),
array('label'=>'Exportar Alumnos','url'=>array('exportar')),    
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('alumno-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Administrar Alumnos</h1>

<p>
	Puede utilizar opcionalmente los operadores (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	o <b>=</b>) al comienzo de cada uno de los campos por los que desea buscar.
</p>


<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>


<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form 

LISTADO DE ALUMNOS COMPLETO -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'alumno-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'idAlumno',
                'nombreCompleto',  
		'legajo',
		'lua',
		'idMadre',
		/*
		'idTutor',
		'idCliente',
		*/
                array
                (
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'deleteConfirmation'=>"js:'Desea eliminar el alumno?'" ,
                    'template'=>'{view}{update}{delete}',
                    'buttons'=>array
                    (
                        'view' => array
                        (
                            'label'=>'Ver Alumno',
                           
                        ),
                        'update' => array
                        (
                            'label'=>'Modificar Alumno',
                           
                        ),
                        'delete' => array
                        (
                            'label'=>'Eliminar Alumno',
                            
                           
                        ),
                    ),
                ),

 
),
    
)); ?>


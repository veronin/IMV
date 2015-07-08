<?php
$this->breadcrumbs=array(
	yii::t('app','Users')=>array('index'),
	yii::t('app','Manage'),
);

$this->menu=array(
array('label'=>'Listar Persona','url'=>array('index')),
array('label'=>'Crear Persona','url'=>array('create')),
array('label'=>'Mail Persona','url'=>array('mail')),    
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('persona-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<h1><?php echo yii::t('app', 'Manage');echo ' ';echo yii::t('app', 'Person');?>s</h1>

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
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'persona-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'idPersona',
		'dni',
		'cuil',
		'nombre',
		'apellido',
		'sexo',
                array(  //'type'=>'date', se aplica ahora el afterFind
                        'name'=>'fechaNac',
                        'value'=>'$data->fechaNac!=null?date("d/m/Y", strtotime($data->fechaNac)):""',
                        
                        'filter'=>$this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                //'name'=>'publishDate',
                                'model'=>$model,
                                'attribute'=>'xfechaNac',
                                'language'=>'es_ar',
                                // additional javascript options for the date picker plugin
                                'options'=>array(
                                    'showAnim'=>'fold',
                                ),
                                'htmlOptions'=>array(
                                    'style'=>'height:20px;'
                                ),
                            ),true)
                        
                ), 
		/*
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
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); 
/*$this->widget('application.extensions.primerWidget.PrimerWidget', array('mensaje'=>'Mensaje desde la VISTA'));
?>

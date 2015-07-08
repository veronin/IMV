<?php
/* @var $this NivelController */
/* @var $model Nivel */

$this->breadcrumbs=array(
	'Nivels'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Nivel', 'url'=>array('index')),
	array('label'=>'Crear Nivel', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#nivel-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Niveles</h1>

<p>
	Puede utilizar opcionalmente los operadores (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	o <b>=</b>) al comienzo de cada uno de los campos por los que desea buscar.
</p>


<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'nivel-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idNivel',
		'nivel',
		'descripcion',
		'cuota',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

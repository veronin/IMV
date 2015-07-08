<?php
$this->breadcrumbs=array(
	'Item Recibos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar ItemRecibo','url'=>array('index')),
array('label'=>'Crear ItemRecibo','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('item-recibo-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Administrar Item Recibos</h1>

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
'id'=>'item-recibo-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'idItemRecibo',
		'idRecibo',
		'importe',
		'idMatricula',
		'pago',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>

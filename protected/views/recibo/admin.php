<?php
$this->breadcrumbs=array(
	'Recibos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar Recibo','url'=>array('index')),
array('label'=>'Crear Recibo','url'=>array('create')),
array('label'=>'Exportar a PDF', 'url'=>array('pdf')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('recibo-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Administrar Recibos</h1>

<!-- GENERACION AUTOMATICA DE RECIBOS DEL MES -->
<div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
            'id'=>'final-form',
            'action'=>$this->createUrl('/recibo/generarRecibos'),
            'enableAjaxValidation'=>false,
            'enableClientValidation'=>false,
            'clientOptions'=>array(
            'validateOnSubmit'=>false,
             )  
        )); 
        if($model->fechaCobroCompleto == null){
                $this->widget('bootstrap.widgets.TbButton', array(
                 'label'=>'Generar RECIBOS del MES: '. date('m').'/'.date('Y'),
                 'type'=>'warning',
                 'buttonType'=>'submit',
                 ));
                }?>

<?php $this->endWidget();?>
 </div>
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
'id'=>'recibo-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array('idCuenta',
               array(
                    'name'=>'idCuenta0',
                    'header'=>'Nombre',
                    'type'=>'raw', 
                    'value'=>'$data->idCuenta0->idCliente0->idPersona0->getFullName()',
                    'htmlOptions'=>array('width'=>'100'),
                   ),
		'idRecibo',
		'fechaEmision',
		'fechaCobroCompleto',
		'concepto',
                'mes',
		'importePendiente',
		
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>


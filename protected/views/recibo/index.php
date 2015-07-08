<?php
$this->breadcrumbs=array(
	'Recibos',
);

if(Yii::app()->user->hasFlash('success')):?>
    <script>alert('<?php echo Yii::app()->user->getFlash('success'); ?>');</script>
    <?php endif;

$this->menu=array(
array('label'=>'Crear Recibo','url'=>array('create')),
array('label'=>'Administrar Recibo','url'=>array('admin')),
);
?>

<h1>Recibos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>

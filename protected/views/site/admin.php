<?php

$this->pageTitle="Administraci&#243;n del sistema";
?>

<h1>Administraci&#243;n del sistema</h1>
<?php
$this->breadcrumbs=array(
	'Admin'=>array('admin'),
	'Admin',
);

$this->menu=array(
	array('label'=>'Cursos', 'url'=>array('nivel')),
	array('label'=>'Niveles', 'url'=>array('curso')),
        array('label'=>'Usuarios', 'url'=>array('usuario')),
); 
?>
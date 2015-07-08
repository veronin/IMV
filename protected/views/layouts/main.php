<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
          
                <img id="logo1"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo1.jpg" alt="Logo IMV" height="20">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
                <div id="dire">Ministro Chirinos 795 Viedma - Rio Negro<br>
                (02920) 424905<br> fundacionpatagonianorte@yahoo.com.ar
                <!--<?php $this->widget('application.extensions.idiomaWidget.LangBox');?>-->
                 </div>

        </div><!-- header -->
        <div id="mainmenu">
              	
		<?php $this->widget('bootstrap.widgets.TbMenu',array(
			'type' => 'pills',
                    'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
                                array('label'=>'Personas', 'url'=>array('/persona')),
                                array('label'=>'Alumnos', 'url'=>array('/alumno')),
                                array('label'=>'Matricula', 'url'=>array('/matricula')),
                                array('label'=>'Cuotas', 'url'=>array('/recibo')),
                                //array('label'=>'Reportes', 'url'=>array('/reportes')),
                                array('label'=>'Personal', 'url'=>array('/usuario'),
                                     'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Niveles', 'url'=>array('/nivel')
                                    , 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Administrar Usuarios'
					, 'url'=>Yii::app()->user->ui->userManagementAdminUrl
					, 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login'
					, 'url'=>Yii::app()->user->ui->loginUrl
					, 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')'
					, 'url'=>Yii::app()->user->ui->logoutUrl
					, 'visible'=>!Yii::app()->user->isGuest),
				/* array('label'=>'Ingresar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'r ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)*/
			)
		)); ?>
            
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Ver&#243;nica Nin<br/>
                <a href="http://www.uncoma.edu.ar/">Universidad Nacional del Comahue</a><br/>
		All Rights Reserved<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

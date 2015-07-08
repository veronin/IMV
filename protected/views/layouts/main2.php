<!DOCTYPE html>
<html lang="es">
    
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Instituto Modelo Viedma">
    <meta name="author" content="Veronica Nin">
    
    <!--<link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/imv.jpg">-->

    <title>Instituto Modelo Viedma</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/extensions/bootstrap/ccs/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/extensions/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/cover.css" rel="stylesheet">

    <script src="cover_archivos/ie-emulation-modes-warning.js"></script>

  <style type="text/css" id="holderjs-style"></style>

</head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand"></h3>
              <ul class="nav masthead-nav">
                  
                <li class="active"><a href="#">Administraci&#243;n</a></li>
                <li><a href="#">Nivel Inicial</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/main1')?>">Nivel Primario</a></li>
                <li><a href="#">Nivel Secundario</a></li>
                
              </ul>
            </div>
          </div>

          <div class="inner cover">
              
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/imv.jpg" alt="Logo IMV">
            
            <h1 class="cover-heading">Instituto Modelo Viedma</h1>           
            <p class="lead">Sistema de Administraci&#243;n de Alumnos</p>
            <section class="lead">
                
            <form class="form-inline" action="form1.php">
                <input type="text" class="input-small" placeholder="Usuario">
                <input type="password" class="input-small" placeholder="Clave">
                <button type="submit" class="btn btn-lg btn-default">Ingresar</button>
            </form>
            </section>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Dise&#241;ado por Ver&#243;nica Nin - <a href="http://www.uncoma.edu.ar/">Universidad Nacional del Comahue</a></p>
            </div>
          </div>

        </div>

      </div>

    </div>

  </body>

</html>
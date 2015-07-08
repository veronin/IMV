<?php

// uncomment the following to define a path alias
 Yii::setPathOfAlias('boostrap','application.extensions.bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Instituto Modelo Viedma',
        'theme'=>'bootstrap',
	// preloading 'log' component
	'preload'=>array('log', 'bootstrap'),
        'language'=>'es_ar', 

	// autoloading model and component classes
	'import'=>array(
                //'application.models._base.*',
                'application.models._base.*',
		'application.models.*',
		'application.components.*',
                'application.modules.cruge.components.*',
		'application.modules.cruge.extensions.crugemailer.*',
                'boostrap.*'
	),

	'modules'=>array(
                'reportes',
            // Cruge
                'cruge'=>array(
                        'tableprefix'=>'cruge_',
                        'availableAuthMethods'=>array('default'),
                        'availableAuthModes'=>array('username','email'),
                        // url base para los links de activacion de cuenta de usuario
			'baseUrl'=>'http://coco.com/',
                        // NO OLVIDES PONER EN FALSE TRAS INSTALAR
				'debug'=>true,
				'rbacSetupEnabled'=>true,
				'allowUserAlways'=>true,
                        // MIENTRAS INSTALA: false
                                'useEncryptedPassword' => false,
                        // Algoritmo de la función hash que deseas usar
                                'hash' => 'md5',
                        // Estos tres atributos controlan la redirección del usuario.
                                'afterLoginUrl'=>null,
				'afterLogoutUrl'=>null,
				'afterSessionExpiredUrl'=>null,
			// manejo del layout con cruge.
                                'loginLayout'=>'//layouts/column2',
				'registrationLayout'=>'//layouts/column2',
				'activateAccountLayout'=>'//layouts/column2',
				'editProfileLayout'=>'//layouts/column2',
                                'generalUserManagementLayout'=>'ui',
                                'userDescriptionFieldsArray'=>array('email'), 
			),
                    
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'veronin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths' => array(
                        'bootstrap.gii'
                ),
		
	),
     ),       
	// application components
	'components'=>array(
                
                 'user'=>array(
				'allowAutoLogin'=>true,
				'class' => 'application.modules.cruge.components.CrugeWebUser',
				'loginUrl' => array('/cruge/ui/login'),
			),
			'authManager' => array(
                                'class' => 'application.components.MyCrugeAuthManager',	
                                //'class' => 'application.modules.cruge.components.CrugeAuthManager',
			),
			'crugemailer'=>array(
				'class' => 'application.modules.cruge.components.CrugeMailer',
				'mailfrom' => 'email-desde-donde-quieres-enviar-los-mensajes@xxxx.com',
				'subjectprefix' => 'Tu Encabezado del asunto - ',
				'debug' => true,
			),
                        'format'=>array('class'=> 'CLocalizedFormatter'),
            
		/*'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),*/

		// uncomment the following to enable URLs in path-format
                'urlManager' => array(
                'urlFormat' => 'path',
                'rules' => array(
                    'post/<id:\d+>/<title:.*?>' => 'post/view',
                    'posts/<tag:.*?>' => 'post/index',
                    // REST patterns
                    array('api/list', 'pattern' => 'api/<model:\w+>', 'verb' => 'GET'),
                    array('api/view', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'GET'),
                    array('api/update', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'PUT'),
                    array('api/delete', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'DELETE'),
                    array('api/create', 'pattern' => 'api/<model:\w+>', 'verb' => 'POST'),
                    // Other controllers
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                ),
        ),
                'bootstrap' => array(
                        'class' => 'application.extensions.bootstrap.components.Bootstrap',
                        'responsiveCss' => true,
                ),
		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
            
             'ePdf' => array(
                'class'         => 'ext.yii-pdf.EYiiPdf',
                'params'        => array(
                    'mpdf'     => array(
                'librarySourcePath' => 'application.vendors.mpdf.*',
                'constants'         => array(
                    '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                ),
                'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                /*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                    'mode'              => '', //  This parameter specifies the mode of the new document.
                    'format'            => 'A4', // format A4, A5, ...
                    'default_font_size' => 0, // Sets the default document font size in points (pt)
                    'default_font'      => '', // Sets the default font-family for the new document.
                    'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                    'mgr'               => 15, // margin_right
                    'mgt'               => 16, // margin_top
                    'mgb'               => 16, // margin_bottom
                    'mgh'               => 9, // margin_header
                    'mgf'               => 9, // margin_footer
                    'orientation'       => 'P', // landscape or portrait orientation
                )*/
            ),
            'HTML2PDF' => array(
                'librarySourcePath' => 'application.vendors.html2pdf.*',
                'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                /*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                    'orientation' => 'P', // landscape or portrait orientation
                    'format'      => 'A4', // format A4, A5, ...
                    'language'    => 'en', // language: fr, en, it ...
                    'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                    'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                    'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                )*/
            )
            ),
  

            )
            

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);

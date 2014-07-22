<?php


// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

#Seteando Path Alias para mi carpeta de clases
Yii::setPathOfAlias('me',dirname(__FILE__)."/../../../jmadridcamacho");

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Practice with Yii',
    //Se apunta al tema 'blackboot' guardado en la carpeta 'themes'
    'theme'=>'blackboot',

	// preloading 'log' component
    'preload'=>array('log','happy','sad'),


	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        #Llamando mi propio import
        #'me.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	// application components
	'components'=>array(

		#Componente para permisologias de roles
		'authManager'=>array(
			#Va dirigido a una base de datos
			"class"=>"CDbAuthManager",
			#Se indica el nombre del componente que va a la BD
			"connectionID"=>"db",
			),

		#Definiendo componente propio
		#Los componentes siempre van a recibir un parametro llamado 'class' que es la clase en que esta basada ese componente
		/*'happy'=>array(
				'class'=>'ext.JMHappy',
		),
		'sad'=>array(
				'class'=>'ext.RHappy',
				#Seteando los atributos de la clase
				'saludo'=>1,
		),*/


		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
            //'urlSuffix'=>'.php',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'pgsql:host=localhost;port=5432;dbname=facilito',
			'emulatePrepare' => true,
			'username' => 'postgres',
			'password' => 'admin',
			'charset' => 'utf8',
		),

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
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);

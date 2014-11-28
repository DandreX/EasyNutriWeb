<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'EasyNutri',

    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'),
        'editable' => realpath(__DIR__ . '/../extensions/x-editable'),
    ),
    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'bootstrap.helpers.*',
        'bootstrap.components.*',
        'bootstrap.widgets.*',
        'bootstrap.behaviors.*',
        'application.models.*',
        'application.components.*',
        'editable.*'
    ),

    'modules' => array(

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array('bootstrap.gii'),
        ),

    ),

    // application components
    'components' => array(

        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),

        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),

        'editable' => array(
            'class' => 'editable.EditableConfig',
            'form' => 'bootstrap', //form style: 'bootstrap', 'jqueryui', 'plain'
            'mode' => 'inline', //mode: 'popup' or 'inline'
            'defaults' => array( //default settings for all editable elements
                'emptytext' => 'Click to edit'
            )
        ),
        // uncomment the following to enable URLs in path-format
        /*
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        */

//        'db' => array(
//            'connectionString' => 'Data Source=sqlsrv:Server=192.168.246.64,1433\SQLEXPRESS;Initial Catalog=EasyNutriDB;Integrated Security=False;User ID=EasyNutri;Password=dreamteam;',
//
//        ),

        // uncomment the following to use a MySQL database

        'db' => array(
            'connectionString' => 'sqlsrv:Server=192.168.246.64,1433\SQLEXPRESS;Database=EasyNutriDB',
            'username' => 'EasyNutri',
            'password' => 'dreamteam',

//            'connectionString' => 'sqlsrv:Server=(localdb)\v11.0;Database=EasyNutriDB;',
//            'username' => 'localuser',
//              'password' => 'localuser',
        ),

        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),


);
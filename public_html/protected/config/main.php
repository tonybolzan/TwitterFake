<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Twitter Fake',
    'defaultController' => 'site',
    'sourceLanguage' => 'pt_br',
    'language' => 'pt_br',
    'preload' => array(
        'log',
        'bootstrap',
    ),
    'import' => array(
        'application.models.*',
        'application.models.forms.*',
        'application.components.*',
        'ext.giix-components.*',
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'generatorPaths' => array(
                'ext.giix-core',
            ),
            'password' => 'admin',
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    'components' => array(
        'user' => array(
            'allowAutoLogin' => true,
            'loginUrl' => array('site/login'),
        ),
        'request'=>array(
            'enableCsrfValidation'=>true,
        ),
        /*
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive'=>true,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        */
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'coreCss' => false,
            'responsiveCss' => false,
            'enableJS' => false,
            'plugins' => false,
        ),
        // Substituir por um servidor MemCache
        'cache' => array(
            'class' => 'system.caching.CDummyCache',
        ),
        'db' => array(
			'connectionString' => 'sqlite:protected/data/sys.db',
        ),
        'authManager'=>array(
            'class'=>'CPhpAuthManager',
            'defaultRoles'=>array('admin'),
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                    'enabled' => true,
                ),
                array(
                    'class' => 'CEmailLogRoute',
                    'levels' => 'warning',
                    'emails' => 'admin@tonybolzan.com',
                    'enabled' => false,
                ),
                array(
                    'class' => 'CWebLogRoute',
                    'enabled' => false,
                ),
            ),
        ),
    ),
    // Yii::app()->params['paramName']
    'params' => array(
        'emailSupport' => 'admin@tonybolzan.com',
    ),
);

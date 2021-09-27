<?php



$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'TDOT',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Sbrdz9G87wYQkSSw9uxPdzkH_gIYU_Ss',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'app\modules\user\components\User',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            - text: >
                @@ -13,20 +13,28 @@
                # SECURITY WARNING: KEEP secret
                SECRET_KEY = {{SECRET_KEY}}
                +EMAIL_USE_TLS = True
                +EMAIL_HOST = smtp.gmail.com
                +EMAIL_HOST_USER = tdotacademy44@gmail.com
                +EMAIL_HOST_PASSWORD = Shasuro@44
                +EMAIL_PORT = 587
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'encryption' => 'tls',
                'host' => 'smtp.gmail.com',
                'port' => '587',
                'username' => 'tdotacademy44@gmail.com',
                'password' => 'Shasuro@44',
            ],
            'useFileTransport' => false,

        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'view'=>[
            'theme' => [
                'basePath' => '@webroot/themes/custom',
                'baseUrl' => '@web/themes/custom',
            ],

        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

        'socialShare' => [
            'class' => \ymaker\social\share\configurators\Configurator::class,
            'socialNetworks' => [
                'telegram' => [
                    'class' => \ymaker\social\share\drivers\Telegram::class,
                    'label' => '<span class="fa-stack">
                               <i class="fas fa-circle fa-stack-2x telegram-back"></i>
                               <i class="fab fa-telegram-plane  fa-stack-1x fa-inverse"></i>
                           </span>',
                ],
                'facebook' => [
                    'class' => \ymaker\social\share\drivers\Facebook::class,
                    'label' => '<span class="fa-stack">
                                   <i class="fas fa-circle fa-stack-2x facebook-back"></i>
                                   <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                               </span>',
                ],
                'twitter' => [
                    'class' => \ymaker\social\share\drivers\Twitter::class,
                    'label' => '<span class="fa-stack">
                                   <i class="fas fa-circle fa-stack-2x twitter-back"></i>
                                   <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                               </span>',
                ],
                'gmail' => [
                    'class' => \ymaker\social\share\drivers\Gmail::class,
                    'label' => '<span class="fa-stack">
                                   <i class="fas fa-circle fa-stack-2x instagram-back"></i>
                                   <i class="fas fa-at fa-stack-1x fa-inverse"></i>
                               </span>',
                ],
            ],
        ],
    ],

    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
            'bsVersion' => '4'


        ],
        'user' => [
            'class' => 'app\modules\user\Module',
            // set custom module properties here ...
            'layout'=>'@app/views/layouts/registration',
            'requireEmail' => true,
            'requireUsername' => true

        ],

    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
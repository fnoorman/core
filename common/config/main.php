<?php
return [
    'layout'=>'base',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => '@themes/unify/assets/plugins/jquery',
                    'js'=>['jquery.min.js']
                ],
            ],
            'appendTimestamp' => true,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'rightManager' => [
            'class' => 'common\components\DBRights',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],


    ],
];

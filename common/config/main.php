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

    ],
];

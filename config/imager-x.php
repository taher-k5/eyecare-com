<?php

return array(
    'allowUpscale' => false,
    'imagerSystemPath' => '@webroot/imager',
    'imagerUrl' => rtrim(getenv('AWS_BASE_URL'), '/') . '/imager',
    'suppressExceptions' => true,
    // 'storages' => ['aws'],
    'addVolumeToPath' => false,
    /*'storageConfig' => [
        'aws' => [
            'accessKey' => getenv('AWS_ACCESS_KEY'),
            'secretAccessKey' => getenv('AWS_SECRET_ACCESS_KEY'),
            'region' => getenv('AWS_REGION'),
            'bucket' => getenv('AWS_BUCKET'),
            'folder' => 'imager',
            'requestHeaders' => array(),
            'storageType' => 'standard',
            'cloudfrontInvalidateEnabled' => false,
            'cloudfrontDistributionId' => '',
        ],
    ],*/

    'transformer' => 'craft',
    'cacheEnabled' => true,
    'cacheRemoteFiles' => true,
    'cacheDuration' => 31536000, // 1 year
    'cacheDurationRemoteFiles' => 31536000, // 1 year
    'cacheDurationExternalStorage' => 31536000, // 1 year
    'cacheDurationNonOptimized' => 300, // 1 year
    'hashPath' => true,
    'jpegoptimEnabled' => false,
    'optipngEnabled' => true,
    'mozjpegEnabled' => true,
    'mozjpegPath' => '/usr/bin/mozjpeg',
    'jpegQuality' => 30,
    'pngCompressionLevel' => 0,
    'useCwebp' => true,
    'cwebpPath' => '/usr/bin/cwebp',
    // 'cwebpPath' => '/usr/local/Cellar/webp/1.1.0/bin/cwebp',
    'pngCompressionLevel' => 0,
    'allowUpscale' => false,
    'smartResizeEnabled' => false,
    'removeMetadata' => true,

    'fillTransforms' => true,
    'fillInterval' => '200',
    'interlace' => 'line',
    'optimizers' => ['mozjpeg', 'pngquant', 'optipng'],
    'optimizeType' => 'runtime',
    'optimizerConfig' => [
        'mozjpeg' => [
            'extensions' => ['jpg'],
            'path' => '/usr/bin/mozjpeg',
            'optionString' => '-optimize -copy none',
        ],
        'optipng' => [
            'extensions' => ['png'],
            'path' => '/usr/bin/optipng',
            'optionString' => '-o2 -strip all',
        ],
        'pngquant' => [
            'extensions' => ['png'],
            'path' => '/usr/bin/pngquant',
            'optionString' => '--strip --skip-if-larger',
        ],
    ]
);

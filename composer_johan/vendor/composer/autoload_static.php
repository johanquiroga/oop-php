<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6f5387c94d1569ec383b4d3568142a60
{
    public static $files = array (
        '0f8374a27d0322e34c26c5cbeacc80a6' => __DIR__ . '/../..' . '/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Styde\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Styde\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6f5387c94d1569ec383b4d3568142a60::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6f5387c94d1569ec383b4d3568142a60::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
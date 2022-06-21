<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a17cdf7e3c3e7edc81326acc03e1f52
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'App\\crud\\crud' => __DIR__ . '/../..' . '/src/crud/crud.php',
        'App\\database_tools' => __DIR__ . '/../..' . '/src/database_tools.php',
        'App\\src' => __DIR__ . '/../..' . '/src/src.php',
        'App\\webutility' => __DIR__ . '/../..' . '/src/webutility.php',
        'App\\webutility_ssp' => __DIR__ . '/../..' . '/src/webutility_ssp.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a17cdf7e3c3e7edc81326acc03e1f52::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a17cdf7e3c3e7edc81326acc03e1f52::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3a17cdf7e3c3e7edc81326acc03e1f52::$classMap;

        }, null, ClassLoader::class);
    }
}

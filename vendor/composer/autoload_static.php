<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a17cdf7e3c3e7edc81326acc03e1f52
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Autoloading\\' => 12,
            'AutoloadingExample\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Autoloading\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'AutoloadingExample\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'AutoloadingExample\\Example' => __DIR__ . '/../..' . '/src/Example.php',
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

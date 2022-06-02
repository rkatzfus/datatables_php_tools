<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1dc1a300c9a3d7c46ff7277c97a248a9
{
    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'lib\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'lib\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1dc1a300c9a3d7c46ff7277c97a248a9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1dc1a300c9a3d7c46ff7277c97a248a9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1dc1a300c9a3d7c46ff7277c97a248a9::$classMap;

        }, null, ClassLoader::class);
    }
}
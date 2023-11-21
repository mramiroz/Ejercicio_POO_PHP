<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf3ca4c1718cb611fe18314b4c6896a47
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'POO\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'POO\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/POO',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf3ca4c1718cb611fe18314b4c6896a47::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf3ca4c1718cb611fe18314b4c6896a47::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf3ca4c1718cb611fe18314b4c6896a47::$classMap;

        }, null, ClassLoader::class);
    }
}
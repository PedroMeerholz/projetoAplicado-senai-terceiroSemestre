<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite1e8b8d58ed83aee5a6918d676d13770
{
    public static $files = array (
        'ef7ca0904b63defd76e58ac67b0922b9' => __DIR__ . '/../..' . '/config/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'core\\' => 5,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite1e8b8d58ed83aee5a6918d676d13770::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite1e8b8d58ed83aee5a6918d676d13770::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite1e8b8d58ed83aee5a6918d676d13770::$classMap;

        }, null, ClassLoader::class);
    }
}

<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfa2223272540a3bfb55f92182cdc001a
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfa2223272540a3bfb55f92182cdc001a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfa2223272540a3bfb55f92182cdc001a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

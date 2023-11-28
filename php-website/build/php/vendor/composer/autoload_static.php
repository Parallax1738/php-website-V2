<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite0296d8af6e60cb0a4057f0d636e1ffd
{
    public static $prefixLengthsPsr4 = array (
        'j' => 
        array (
            'joshtronic\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'joshtronic\\' => 
        array (
            0 => __DIR__ . '/..' . '/joshtronic/php-loremipsum/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite0296d8af6e60cb0a4057f0d636e1ffd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite0296d8af6e60cb0a4057f0d636e1ffd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite0296d8af6e60cb0a4057f0d636e1ffd::$classMap;

        }, null, ClassLoader::class);
    }
}

<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc5948d13f6443efa3338b20451c4b5a8
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc5948d13f6443efa3338b20451c4b5a8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc5948d13f6443efa3338b20451c4b5a8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc5948d13f6443efa3338b20451c4b5a8::$classMap;

        }, null, ClassLoader::class);
    }
}

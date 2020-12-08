<?php
function Autoload($className)
{
    $extension =  spl_autoload_extensions();
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filename = __DIR__ . DIRECTORY_SEPARATOR . $className . $extension;
    if (is_readable($filename)) {
        require($filename);
    } else {
        die("Impossible d'inclure le fichier $filename");
    }
}

spl_autoload_extensions('.php');
spl_autoload_register('Autoload');
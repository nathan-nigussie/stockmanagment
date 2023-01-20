<?php
spl_autoload_register('fileAutoLoader');
function fileAutoLoader($className)
{
    $path = "../model/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;
    include_once $fullPath;

    //error handler
    if (file_exists($fullPath)) {
        return false;
    }
}
<?php

defined('ROOT') || define('ROOT', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

spl_autoload_register(function ($sClassName) {

    if (stripos($sClassName, "valid") !== false && !existsInClasses($sClassName))
        $sExtraFolder = "validation/";
    elseif ((stripos($sClassName, "filefactory") !== false || stripos($sClassName, "upload") !== false) && !existsInClasses($sClassName))
        $sExtraFolder = "files/";
    elseif (stripos($sClassName, "display") !== false && !existsInClasses($sClassName))
        $sExtraFolder = "display/";
    elseif (stripos($sClassName, "data") !== false && !existsInClasses($sClassName))
        $sExtraFolder = "data/";
    else
        $sExtraFolder = "";

    require_once ROOT . 'classes/' . $sExtraFolder . $sClassName . '.php';
});

function existsInClasses($sClassName) {
    return file_exists(ROOT . "classes/$sClassName.php");
}

<?php

function cleanArray(&$aData) {
    if (is_array($aData)) {
        foreach ($aData as &$sInfo) {
            if (is_array($sInfo))
                cleanarray($sInfo);
            $sInfo = trim(htmlspecialchars(stripslashes($sInfo), ENT_QUOTES));
        }
    }
}

function setIfNotSet(&$gVariable, $gValue) {
    if (!isset($gVariable) || empty($gVariable))
        $gVariable = $gValue;
}

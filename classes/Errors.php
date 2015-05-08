<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Errors
 *
 * @author lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 */
defined('ROOT') || header("Location: /error?errorCode=500");

class Errors {

    private $aErrors;

    public function __construct() {
        $this->aErrors = array(
            "500" => "Internal server error has occured, and the admin has been notified of it. Please try again in 5 minutes time.",
            "404" => "Requested page not found.",
            "504" => "Server ran out of time while processing your request. Please refresh and try again.",
            "403" => "You are not allowed to access this page",
            "503" => "Service temporarily unavailable.",
            "401" => "Page you were trying to access can not be loaded until you first log on with a valid email and password.",
            "other" => "Database related error. This will be fixed shortly",
        );
    }

    public function getError($sErrorCode) {
        $sErrorCode = $sErrorCode;

        if (array_key_exists($sErrorCode, $this->aErrors) === false)
            $sErrorCode = "other";

        return $this->aErrors[$sErrorCode];
    }

    public static function getErrorDescription($sErrorCode) {
        $oErrors = new Errors;
        $sErrorMessage = $oErrors->getError($sErrorCode);
        unset($oErrors);
        echo $sErrorMessage;
    }

}

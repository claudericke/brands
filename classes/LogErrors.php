<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogErrors
 *
 * @author lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 */
defined('ROOT') || header("Location: /error?errorCode=500");

class LogErrors {

    public static function logError($sErrorCode, $sErrorMessage) {

        $sErrorMessage = htmlspecialchars($sErrorMessage, ENT_QUOTES);

        $oPdo = DatabaseConnection::getConnection()->getConnInstance();
        $sQuery = "INSERT INTO br_errorlog (`errorcode`, `errormessage`) VALUES ('$sErrorCode', '$sErrorMessage')";
        try {
            $oPdo->query($sQuery);
        } catch (PDOException $oPdoExcetion) {
            exit("Failed to log an error because the error below occured:\n\r <br/>" . $oPdoExcetion);
        }
    }

}

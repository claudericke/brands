<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class that will manage user registrations
 *
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 */
defined('ROOT') || die("Server error occured");

class User {

    private $iUserId;
    private $aUserData;
    private $oPDO;
    private $sUsersTable;

    public function __construct($sUsersTable = "br_users") {
        $this->iUserId = 0;
        $this->aUserData = array();
        $this->oPDO = DatabaseConnection::getConnection()->getConnInstance();
        $this->sUsersTable = $sUsersTable;
    }

    public function setUserDataByEmail($sEmailAddress, $sPassword = "") {
        $sExtras = "";
        if (!empty($sPassword)) {
            $oHashObj = HashKeys::getHashInstance($sPassword);
            $sPassword = $oHashObj->getHashedKey();
            $sExtras = " AND Password='$sPassword' AND Activated=1";
        }
        $sQuery = "SELECT * FROM {$this->sUsersTable} WHERE Email='$sEmailAddress'$sExtras LIMIT 1";
        try {
            $aResult = $this->oPDO->query($sQuery)
                    ->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $oException) {
            LogErrors::logError($oException->getCode(), $oException->getMessage());
            $sServerPage = "/error?errorCode=" . $oException->getCode();
            header("Location: $sServerPage");
        }

        if (count($aResult) > 0) {
            $this->aUserData = $aResult;
        }
    }

    public function setUserDataById($iUserId) {
        $this->changeUserId($iUserId);
        $sQuery = "SELECT * FROM {$this->sUsersTable} WHERE id=$iUserId LIMIT 1";

        try {
            $aResult = $this->oPDO->query($sQuery)
                    ->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $oException) {
            LogErrors::logError($oException->getCode(), $oException->getMessage());
            $sServerPage = "/error?errorCode=" . $oException->getCode();
            header("Location: $sServerPage");
        }

        if (count($aResult) > 0) {
            $this->aUserData = $aResult;
        }
    }

    public function updateLastUpdated($iUserId) {
        $sLastUpdated = date("Y-m-d H:i:s");
        $sQuery = "UPDATE {$this->sUsersTable} SET DateUpdated='$sLastUpdated' WHERE id=$iUserId";
        try {
            $this->oPDO->exec($sQuery);
        } catch (PDOException $oException) {
            LogErrors::logError($oException->getCode(), $oException->getMessage());
            $sServerPage = "/error?errorCode=" . $oException->getCode();
            header("Location: $sServerPage");
        }
    }

    public function changeUserId($iUserId) {
        $this->iUserId = $iUserId;
    }

    public function getUserData() {
        $aUserData = array();
        foreach ($this->aUserData as $aData) {
            $aUserData = $aData;
        }

        return $aUserData;
    }

    public function activateAccount($sEmailAddress) {
        $sLastUpdated = date("Y-m-d H:i:s");
        $sQuery = "UPDATE {$this->sUsersTable} SET Activated=1,DateUpdated='$sLastUpdated' WHERE Email='$sEmailAddress'";
        try {
            $this->oPDO->exec($sQuery);
        } catch (PDOException $oException) {
            LogErrors::logError($oException->getCode(), $oException->getMessage());
            $sServerPage = "/error?errorCode=" . $oException->getCode();
            header("Location: $sServerPage");
        }
    }

}

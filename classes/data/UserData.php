<?php

defined('ROOT') || header("Location: /error?errorCode=500");

/**
 * Fetches and returns user data
 *
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 */
class UserData extends AbstractData {

    public function __construct($sUsersTable = "br_user") {
        parent::__construct($sUsersTable);
    }

    /**
     * Fetches user data where email, and password if not empty, is the same as the one specified in parameters
     *
     * @param String $sEmailAddress
     * @param String $sPassword
     */
    public function setUserDataByEmail($sEmailAddress, $sPassword = "") {
        $sExtras = "";
        if (!empty($sPassword)) {
            $oHashObj = HashKeys::getHashInstance($sPassword);
            $sPassword = $oHashObj->getHashedKey();
            $sExtras = " AND Password='$sPassword' AND Activated='1'";
        }
        $sQuery = "SELECT * FROM {$this->sTable} WHERE Email='$sEmailAddress'$sExtras LIMIT 1";
        $aResult = DatabaseConnection::fetchData($sQuery);
        if (count($aResult) > 0) {
            $this->aData = $aResult;
        }
    }

    /**
     * Activates user account based on the email address in parameters
     *
     * @param String $sEmailAddress
     */
    public function activateAccount($sEmailAddress) {
        $sLastUpdated = date("Y-m-d H:i:s");
        $sQuery = "UPDATE {$this->sTable} SET Activated='1',DateUpdated='$sLastUpdated' WHERE Email='$sEmailAddress'";
        try {
            $this->oPDO->exec($sQuery);
        } catch (PDOException $oException) {
            LogErrors::logError($oException->getCode(), $oException->getMessage());
            $sServerPage = "/error?errorCode=" . $oException->getCode();
            header("Location: $sServerPage");
        }
    }

}

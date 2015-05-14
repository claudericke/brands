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

    public static function accountActivation() {
        if (isset($_GET['authenticate']) && !empty($_GET['authenticate'])) {
            $sSalt = "smartgenericemail+";
            $sEmailAddress = str_replace($sSalt, '', base64_decode($_GET['authenticate']));

            $oUser = new UserData();
            $oUser->setUserDataByEmail($sEmailAddress);
            $aUserData = $oUser->getData();
            if (is_array($aUserData[0]) && count($aUserData) > 0) {
                $aUserData = $aUserData[0];
                if ($aUserData['Activated'] == 1) {
                    echo '<span class="error red">Your account is already activated</span>';
                } else {
                    $oUser->activateAccount($sEmailAddress);
                    echo '<span class="success">Your account was successfully activated. You can now <a href="/control/login/" title="Login">log in.</a></span>';
                }
            } else {
                echo "<span class='error red'>Seems like you clicked on an expired activation link. This data no longer exists on our system.</span>";
            }
        } else {
            echo "Expired page. Please click on the proper link sent to you via mail.";
        }
    }

}

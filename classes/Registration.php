<?php

/**
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 *
 * @copyright (c) 2013, Lebogang Ratsoana
 *
 * @uses conn class to connect to database
 *
 * 07 April 2013
 */
defined('ROOT') || header("Location: /error?errorCode=500");

class Registration {

    private $aPostData;
    private $oPDO;
    private $aDatabaseFields;
    private $sUsersTable;
    private $bHasErrors;
    private $aErrorMessage;

    public function __construct($aPostData, $aDatabaseFields) {
        $this->oPDO = DatabaseConnection::getConnection()->getConnInstance();
        $this->aPostData = $aPostData;
        $this->sUsersTable = "br_user";
        $this->bHasErrors = false;
        $this->aErrorMessage = array();
        foreach ($aDatabaseFields as $sTableName => $aTable) {
            foreach ($aTable as $aField) {
                $this->aDatabaseFields[$sTableName][] = $aField[0];
            }
        }
    }

    public function createUser($sActivationScript, $sAdminMail, $sWebTitle) {
        $aExactValues = $this->aPostData;
        extract($aExactValues, EXTR_PREFIX_ALL, 's');

        if ($this->checkUserUsingEmail($aExactValues['emailAddress'])) {
            $this->setError("{$aExactValues['companyName']} already exists on the system with email {$aExactValues['emailAddress']}");
            $this->bHasErrors = true;
        } else {
            $sPassword = $aExactValues['password'];
            $sDatabaseFields = "`" . implode("`,`", $this->aDatabaseFields[$this->sUsersTable]) . "`";
            $oHashObj = HashKeys::getHashInstance($sPassword);
            $sSavedPassword = $oHashObj->getHashedKey();

            $aUserDataStrip = array($aExactValues['companyName'], $aExactValues['name'], $aExactValues['surname'], $aExactValues['emailAddress'], $sSavedPassword, 0, 0, strtotime("now"), "now()", date("Y-m-d H:i:s"));
            $sTempValues = self::setTempValues(count($aUserDataStrip));
            $qQuery = "INSERT INTO $this->sUsersTable ($sDatabaseFields) VALUES ($sTempValues)";

            $iUserid = DatabaseConnection::insertData($qQuery, $aUserDataStrip);

            if ($iUserid) {
                $aCompanyDataStrip = array($iUserid, $aExactValues["companyName"], $aExactValues["tradingName"], $aExactValues['industry'], "None", 0, "now()", date("Y-m-d"),);
                $iCompanyId = $this->createCompany($aCompanyDataStrip);
                $sPreferredLingo = "['English']";
                if (!empty($aExactValues["preferredLanguage"])) {
                    $sPreferredLingo = "['" . implode("','", $aExactValues["preferredLanguage"]) . "']";
                }

                $sPreferredCori = "['Email']";
                if (!empty($aExactValues["preferedCorrespondence"])) {
                    $sPreferredCori = "['" . implode("','", $aExactValues["preferedCorrespondence"]) . "']";
                }

                $sSubscribe = $aExactValues["magazineSubscription"] == "Yes" ? 1 : 0;
                $sThirdPartyMarketing = $aExactValues["thirdPartMarketing"] == "Yes" ? 1 : 0;
                $aCompanyContacts = array(
                    $iCompanyId,
                    $aExactValues["emailAddress"],
                    $aExactValues["alternativeEmail"],
                    $aExactValues["companyPhone"],
                    "00000000000",
                    "00000000000",
                    "No address",
                    "No Address",
                    "no Registration Number",
                    $sPreferredLingo,
                    "",
                    $sPreferredCori,
                    $sSubscribe,
                    $sThirdPartyMarketing,
                    "now()",
                    date("Y-m-d H:i:s"),
                );

                $this->createCompanyContacts($aCompanyContacts);

                $sEmailbody = htmlspecialchars($this->generateNotification($s_emailAddress, $aExactValues["companyName"], $sPassword, $sActivationScript, $sWebTitle), ENT_QUOTES);
                $sSubject = "$s_username $sWebTitle account activation";
                $sFromemail = "$sWebTitle <$sAdminMail>";
                $sContenttype = "text/html";
                $sDatabasefields = "`userid`, `subject`, `contenttype`, `emailfrom`, `emailsto`, `emailbody`, `datecreated`";
                //$qQuery = "INSERT INTO msgout ($sDatabasefields) VALUES ('$iUserid','$sSubject','$sContenttype','$sFromemail','$s_email','$sEmailbody','$s_datecreated')";
                $sqQuery = "INSERT INTO br_messagessentout ($sDatabasefields) VALUES (?,?,?,?,?,?,?)";

                $aMessageValues = array($iUserid, $sSubject, $sContenttype, $sFromemail, $s_emailAddress, $sEmailbody, date("Y-m-d H:i:s")
                );
                $iMailId = DatabaseConnection::insertData($sqQuery, $aMessageValues);

                $oEmail = new Email(1.0, 'br_messagessentout', $iMailId);
                $oEmail->sendMail();
                if ($oEmail->mailHasErrors()) {
                    $this->bHasErrors = true;
                    $this->setError("Could not send activation code to user (subcode) because: " . $oEmail->getErrorMessages());
                }
            }
        }
    }

    public function createCompany($aCompanyData) {
        $sTempValues = self::setTempValues(count($aCompanyData));
        $sCompanyTable = "br_companydetails";
        $sDatabaseFields = "`" . implode("`,`", $this->aDatabaseFields[$sCompanyTable]) . "`";
        $qQuery = "INSERT INTO $sCompanyTable ($sDatabaseFields) VALUES ($sTempValues)";
        return DatabaseConnection::insertData($qQuery, $aCompanyData);
    }

    public function createCompanyContacts($aCompanyContactsData) {
        $sTempValues = self::setTempValues(count($aCompanyContactsData));
        $sCompanyContactsTable = "br_companycontacts";
        $sDatabaseFields = "`" . implode("`,`", $this->aDatabaseFields[$sCompanyContactsTable]) . "`";
        $qQuery = "INSERT INTO $sCompanyContactsTable ($sDatabaseFields) VALUES ($sTempValues)";
        return DatabaseConnection::insertData($qQuery, $aCompanyContactsData);
    }

    public function getErrors() {
        if ($this->bHasErrors) {
            return $this->aErrorMessage;
        }
        return "";
    }

    private function checkUserUsingEmail($sEmail) {
        $oUser = new UserData();
        $oUser->setUserDataByEmail($sEmail);
        $aUserData = $oUser->getData();
        if (count($aUserData) > 0) {
            return true;
        }
        return false;
    }

    private function generateNotification($sEmail, $sPrefferedName, $sPassword, $sActivationScript, $sWebTitle) {
        $sSalt = "smartgenericemail+";
        $sEncryptedEmail = base64_encode($sSalt . $sEmail);
        $sSiteUrl = $_SERVER['SERVER_NAME'] . "/";
        $sEmailTemplate = file_get_contents(ROOT . "/email.html");
        $sMessage = "<p>"
                . "Please click on the link below to activate your account, no further information will be required from you, this is your last step of activating you account. :)<br/><br/>

                                    <a href='$sActivationScript?authenticate=$sEncryptedEmail' title='Activate account'>Activate account</a><br/><br/>
                                    If the link above does not work, please copy the link below into your browser:<br/><br/>
                                    $sActivationScript?authenticate=$sEncryptedEmail"
                . "</p>";

        $sMessage .= "<h4>Login Details:</h4>";

        $sMessage .= "<p>Email: $sEmail<br><br>"
                . "Password: $sPassword</p>";
        $aReplaceables = array("__url__", "__subject__", "__credentials__", "__mail__");
        $aReplaceWith = array("http://$_SERVER[HTTP_HOST]/", "Account confirmation", $sPrefferedName, $sMessage);

        $sBody = str_replace($aReplaceables, $aReplaceWith, $sEmailTemplate);

        return $sBody;
    }

    public static function setTempValues($iNumberofTempValues) {
        $iStart = 0;
        $sTempValues = "";
        while ($iStart < $iNumberofTempValues) {
            if ($iStart > 0) {
                $sTempValues .= ", ";
            }
            $sTempValues .= "?";
            $iStart++;
        }
        return $sTempValues;
    }

    private function setError($sError) {
        $this->aErrorMessage[] = "$sError";
    }

}

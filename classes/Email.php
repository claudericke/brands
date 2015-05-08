<?php

/**
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 *
 * @copyright (c) 2013, Lebogang Ratsoana
 *
 * 07 April 2013
 */
defined('ROOT') || header("Location: /error?errorCode=500");

class Email {

    private $aErrorMessage;
    private $sMsgTable;
    private $bHasErrors;
    private $sMimeVersion;
    private $iMailid;
    private $sSubject;
    private $sContentType;
    private $sEmailFrom;
    private $sEmailsTo;
    private $sEmailBody;
    private $sSiteName;
    private $sWebmasterMail;

    /**
     * Sets up email properties before an email is sent. Checks whether to fetch message from database or not based
     * on the parameters specified ($sMsgTable, $iMsgid). Null and 0 respectively, mean message is not from the database
     *
     * @param string $sMimeVersion Mail version number
     * @param string $sMsgTable Name of the table to retrieve message from
     * @param int $iMsgid Mail id from the database.
     */
    public function __construct($sMimeVersion = 1.0, $sMsgTable = NULL, $iMsgid = 0) {
        $this->sMsgTable = $sMsgTable;
        $this->sMimeVersion = "MIME-Version: $sMimeVersion\r\n";
        $this->bHasErrors = false;
        $this->aErrorMessage = array();
        $this->iMailid = $iMsgid;

        $this->sSubject = NULL;
        $this->sContentType = NULL;
        $this->sEmailFrom = NULL;
        $this->sEmailsTo = NULL;
        $this->sEmailBody = NULL;

        $this->sSiteName = "Brands";
        $this->sWebmasterMail = "webmaster@brands.com";
    }

    /**
     * Sets up every property that the email to be sent will require: subject, message, content type, email from,
     * email to and email body.
     *
     * @param string $sSubject Message subject
     * @param string $sContentType the type of content to be sent through. e.g. text/html, plain-text, etc
     * @param string $sEmailFrom the server admin/webmaster email address
     * @param string $sEmailsTo email where message will be sent
     * @param string $sEmailBody Message to be sent
     */
    public function setproperties($sSubject, $sContentType, $sEmailFrom, $sEmailsTo, $sEmailBody) {
        $this->sSubject = $sSubject;
        $this->sContentType = $sContentType;
        $this->sEmailFrom = $sEmailFrom;
        $this->sEmailsTo = $sEmailsTo;
        $this->sEmailBody = $sEmailBody;
    }

    /**
     * Adds the error message provided in parameters to the list of errors that have already occured while sending this mail
     * @param string $sError
     */
    private function setError($sError) {
        $this->aErrorMessage[] = "<li>$sError</li>";
    }

    /*
     * Sends email using the properties set up either by database fetch of setproperties() method.
     */

    public function sendMail() {
        if (!is_null($this->sMsgTable) and $this->iMailid > 0) {
            $this->getPropertiesFromDb();
        }

        if ($this->sEmailsTo === NULL or $this->sEmailBody === NULL or $this->sContentType === NULL) {
            $this->bHasErrors = true;
            $this->setError("Email headers(email to, content type) and email body were not set");
        } else {
            if (!$this->bHasErrors) {
                $sEol = PHP_EOL;
                $sMailheaders = "From: {$this->sEmailFrom}$sEol";
                $sMailheaders .= "{$this->sMimeVersion}";
                $sMailheaders .= "Content-Type: {$this->sContentType}; charset=ISO-8859-1$sEol";
                $sMailheaders .= "Reply-To: {$this->sSiteName} <{$this->sWebmasterMail}>";
                $sAdditionalheader = "-f{$this->sWebmasterMail}";
                if (!mail($this->sEmailsTo, $this->sSubject, $this->sEmailBody, $sMailheaders, $sAdditionalheader)) {
                    $this->bHasErrors = true;
                    $this->setError("sendmail failed because: " . $this->genericError(true));
                }
            }
        }
    }

    /**
     * Sends an email with the attachment specified in the parameters.
     * @param string $sFileName Name of the file to be sent
     * @param string $sContentType type of a file to be sent
     */
    public function sendMailWithAttachment($sFileName, $sContentType = "pdf") {
        if (!is_null($this->sMsgTable) and $this->iMailid > 0) {
            $this->getPropertiesFromDb();
        }

        if ($this->sEmailsTo === NULL or $this->sEmailBody === NULL or $this->sContentType === NULL) {
            $this->bHasErrors = true;
            $this->setError("Email headers(email to, content type) and email body were not set");
        } else {
            if (!$this->bHasErrors) {
                $sMailHeaders = $this->addAttachment($sFileName, $sContentType);
                $sAdditionalheader = "-f{$this->sWebmasterMail}";

                $bIsSent = mail($this->sEmailsTo, $this->sSubject, "", $sMailHeaders, $sAdditionalheader);
                if (!$bIsSent) {
                    $this->bHasErrors = true;
                    $this->setError("sendmail failed because: " . $this->genericError(true));
                }
            }
        }
    }

    /**
     * Creates an email with attachment and returns the encoded string
     *
     * @param string $sFileName
     * @param string $sContentType
     * @return string
     */
    public function addAttachment($sFileName, $sContentType) {
        $sFileSize = filesize($sFileName);
        $oHandle = fopen($sFileName, "r");

        $sRawContent = fread($oHandle, $sFileSize);

        fclose($oHandle);

        $sContent = chunk_split(base64_encode($sRawContent));

        $sUid = md5(uniqid(time()));
        $sBoundary = md5(time());

        $sEol = PHP_EOL;

        // main header (multipart mandatory)
        $sHeaders = "From: {$this->sEmailFrom}" . $sEol;
        $sHeaders .= "MIME-Version: 1.0" . $sEol;
        $sHeaders .= "Content-Type: multipart/mixed; boundary=\"" . $sBoundary . "\"" . $sEol . $sEol;
        $sHeaders .= "Reply-To: {$this->sSiteName} <{$this->sWebmasterMail}>";
        $sHeaders .= "Content-Transfer-Encoding: 7bit" . $sEol;
        $sHeaders .= "This is a MIME encoded message." . $sEol . $sEol;

        // message
        $sHeaders .= "--" . $sBoundary . $sEol;
        $sHeaders .= "Content-Type: {$this->sContentType}; charset=\"iso-8859-1\"" . $sEol;
        $sHeaders .= "Content-Transfer-Encoding: 8bit" . $sEol . $sEol;
        $sHeaders .= $this->sEmailBody . $sEol . $sEol;

        // attachment
        if (($sPos = strrpos($sFileName, "/")) !== false) {
            $sFileName = substr($sFileName, $sPos + 1);
        }

        $sHeaders .= "--" . $sBoundary . $sEol;
        $sHeaders .= "Content-Type: application/$sContentType; name=\"" . $sFileName . "\"" . $sEol;
        $sHeaders .= "Content-Transfer-Encoding: base64" . $sEol;
        $sHeaders .= "Content-Disposition: attachment" . $sEol . $sEol;
        $sHeaders .= $sContent . $sEol . $sEol;
        $sHeaders .= "--" . $sBoundary . "--";

        return $sHeaders;
    }

    /**
     * Returns unordered list of all the errors that have occured while sending the message
     *
     * @return string|null
     */
    public function getErrorMessages() {
        if ($this->bHasErrors) {
            $sError = "<ul>";
            $sError .= implode("\n", $this->aErrorMessage);
            $sError .= "</ul>";
            return $sError;
        }
        return NULL;
    }

    /**
     * Fetches and sets all the email properties from the database where id is qual to $iMailId
     */
    private function getPropertiesFromDb() {
        $sQuery = "SELECT subject as sSubject, contenttype as sContentType, emailfrom as sEmailFrom, emailsto as sEmailsTo, emailbody as sEmailBody FROM {$this->sMsgTable} WHERE id={$this->iMailid} LIMIT 1";
        $aData = DatabaseConnection::getConnection()
                ->getConnInstance()
                ->query($sQuery)
                ->fetchAll(PDO::FETCH_ASSOC);

        if (count($aData) > 0) {
            $aData = $aData[0];
            extract($aData);
            $sEmailBody = htmlspecialchars_decode($sEmailBody, ENT_QUOTES);
            $this->setproperties($sSubject, $sContentType, $sEmailFrom, $sEmailsTo, $sEmailBody);
        } else {
            $this->bHasErrors = true;
            $this->seterror("Could not retrieve message from {$this->sMsgTable} with id {$this->iMailid} because: " . $this->genericerror());
        }
    }

    /**
     * Checks whether a system/php error occured and returns the error message if so
     * @param boolean $bSystemerror
     * @return string|null
     */
    private function genericError($bSystemerror = false) {
        if ($bSystemerror)
            return error_get_last();
    }

    /**
     * Returns true if errors occured, false otherwise
     * @return boolean
     */
    public function mailHasErrors() {
        return $this->bHasErrors;
    }

    /**
     * Updates date sent on the message table for the message that belongs to the Id specified in parameters.
     *
     * @param int $iMailId id of the message where date sent has to be updated.
     */
    public function updateDateSent($iMailId) {
        $sDateSent = date("Y-m-d H:i:s");
        $sQuery = "UPDATE {$this->sMsgTable} SET datesent='$sDateSent' WHERE id=$iMailId";
        try {
            DatabaseConnection::getConnection()
                    ->getConnInstance()
                    ->exec($sQuery);
        } catch (PDOException $oException) {
            LogErrors::logError($oException->getCode(), $oException->getMessage());
            $sServerPage = "/error?errorCode=" . $oException->getCode();
            header("Location: $sServerPage");
        }
    }

    /**
     * unset all the object created once all is complete.
     */
    public function __destruct() {
        unset($this);
    }

}

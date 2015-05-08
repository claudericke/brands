<?php

require_once '../common.php';
require_once '../tables/tables.php';

require_once ROOT . "phpscripts" . DIRECTORY_SEPARATOR . "cleanArray.php";

if (!empty($_POST)) {

    cleanArray($_POST);
    extract($_POST, EXTR_PREFIX_ALL, 's');
    $iMinstringlength = 3;
    $sActivationScript = "http://" . $_SERVER['SERVER_NAME'] . "/activate-account";
    $sWebTitle = "Brands";
    $sAdminMail = "admin@brands.com";

    $aRequiredFields[] = array('value' => $s_companyName, 'alias' => 'Registered Name of Company', 'type' => 'string', 'minlength' => $iMinstringlength);
    $aRequiredFields[] = array('value' => $s_lastname, 'alias' => 'Last name', 'type' => 'string', 'minlength' => $iMinstringlength);
    $aRequiredFields[] = array('value' => $s_password, 'alias' => 'Password', 'type' => 'string', 'minlength' => 5);
    $aRequiredFields[] = array('value' => $s_email, 'alias' => 'Email', 'type' => 'email', 'minlength' => 5);

    $sFormErrors = '';
    $oValidation = new FieldValidation($aRequiredFields);
    $bHasErrors = $oValidation->validate();

    if ($bHasErrors) {
        $sFormErrors .= "the errors below occured:<br/>" . $oValidation->geterrors();
    } else {
        $aValues = $_POST;
        unset($aValues['password2'], $aValues['updateuser']);
        setIfNotSet($aValues['usertype'], "Admin");
        setIfNotSet($aValues['companyid'], 0);
        setIfNotSet($aValues['userimageid'], 0);
        setIfNotSet($aValues['approved'], "No");
        setIfNotSet($aValues['superapproved'], "No");
        setIfNotSet($aValues['datecreated'], date("Y-m-d H:i:s"));
        setIfNotSet($aValues['dateupdated'], date("Y-m-d H:i:s"));

        $oRegistration = new Registration($aValues, $aTables);
        if ((int) $s_updateuser > 0) {
            $oRegistration->updateUser();
        } else {
            $oRegistration->createUser($sActivationScript, $sAdminMail, $sWebTitle);
        }
        $aErrors = $oRegistration->getErrors();
        if (is_array($aErrors) && count($aErrors) > 0) {
            $sFormErrors .= implode("<br/>", $aErrors);
        } elseif (!empty($aErrors)) {
            $sFormErrors = $aErrors;
        } else {
            $sFormErrors = "Added Successfully.";
        }
    }
    echo $sFormErrors;
} else {
    echo "all fields were empty, please provide data";
}
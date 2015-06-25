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
    $aRequiredFields[] = array('value' => $s_emailAddress, 'alias' => 'Email', 'type' => 'email', 'minlength' => 5);

    $sFormErrors = '';
    $oValidation = new FieldValidation($aRequiredFields);
    $bHasErrors = $oValidation->validate();

    if ($bHasErrors) {
        $sFormErrors .= "the errors below occured:<br/>" . $oValidation->geterrors();
    } else {
        $aValues = $_POST;

        $oRegistration = new Registration($aValues, $aTables);
        $oRegistration->createUser($sActivationScript, $sAdminMail, $sWebTitle);
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

<?php

/**
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 *
 * @copyright (c) 2013, Lebogang Ratsoana
 *
 * @uses emailvalidate,lengthvalidate,numericvalidate,datevalidate
 *
 * 07 April 2013
 */
class FieldValidation {

    public function __construct($aValidate) {

        $this->aErrorMessage = array();
        $this->bHasErrors = false;

        if (!is_array($aValidate)) {
            $this->setError("Field validation object expects an array as a parameter");
            $this->bHasErrors = TRUE;
        } else {
            $this->aValidate = $aValidate;
        }
    }

    public function validate() {
        $oTypeValidation = NULL;
        if (!$this->bHasErrors) {
            foreach ($this->aValidate as $aFields) {
                $sAlias = $aFields['alias'];
                $sType = strtolower($aFields['type']);
                $iMinLength = $aFields['minlength'];
                $sFieldName = $aFields['value'];

                if ($sType == "string") {
                    $sType = "length";
                }

                if ($sType == "phone") {
                    $sType = "numeric";
                }

                $sClassName = ucfirst($sType) . "Validate";

                $oLengthValidation = new LengthValidate($sFieldName, $iMinLength);
                if (!$oLengthValidation->getValidation()) {
                    $sError = $sAlias . $oLengthValidation->getError();
                    $this->setError($sError);
                    $this->bHasErrors = true;
                } else {
                    if (!empty($oTypeValidation) and $oTypeValidation instanceof $sClassName) {
                        $oTypeValidation->resetField($sFieldName);
                    } else {
                        $oTypeValidation = new $sClassName($sFieldName);
                    }
                    if (!$oTypeValidation->getValidation()) {
                        $sError = "$sAlias " . $oTypeValidation->getError();
                        $this->setError($sError);
                        $this->bHasErrors = true;
                    }
                }
            }
        }
        return $this->bHasErrors;
    }

    public function getErrors() {
        if ($this->bHasErrors) {
            $sError = "\n<u>\n";
            $sError .= implode("\n", $this->aErrorMessage);
            $sError .= "\n</u>\n";
            return $sError;
        }
        return "";
    }

    private function setError($sError) {
        $this->aErrorMessage[] = "<li>$sError</li>";
    }

    public function __destruct() {

    }

    private $aValidate;
    private $aErrorMessage;
    private $bHasErrors;

}

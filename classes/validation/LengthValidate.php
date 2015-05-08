<?php

/**
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 *
 * @copyright (c) 2013, Lebogang Ratsoana
 *
 * @uses validatelength class to validate length of the specified field
 *
 * 07 April 2013
 */
class LengthValidate extends AbstractValidation {

    public function __construct($sField, $iRequiredLength = 3) {
        parent::__construct($sField);
        $this->setFieldLength();
        $this->iRequiredLength = $iRequiredLength;
    }

    protected function validateField() {
        if ($this->iFieldLength < $this->iRequiredLength) {
            $this->setError(" length is expected to be  greater than $this->iRequiredLength");
            return FALSE;
        }
        return TRUE;
    }

    private function setFieldLength() {
        $this->iFieldLength = strlen($this->getField());
    }

    private $iFieldLength;
    private $iRequiredLength;

}

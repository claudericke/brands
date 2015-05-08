<?php

/**
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 *
 * @copyright (c) 2013, Lebogang Ratsoana
 *
 * @uses abstractvalidation class to validate numeric field
 *
 * 07 April 2013
 */
class NumericValidate extends AbstractValidation {

    protected function validateField() {
        if (!is_numeric($this->getField())) {
            $this->setError(" is expected to be a number but is not");
            return FALSE;
        }
        return true;
    }

}

<?php

/**
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 *
 * @copyright (c) 2013, Lebogang Ratsoana
 *
 * @uses abstractvalidation class to create an interface for all validation classes
 *  to extend. with one abstract function validateField which will be implemented
 *  by all validation classes inheriting from it.
 *
 * @abstract
 */
abstract class AbstractValidation {

    public function __construct($sField) {
        $this->sField = $sField;
        $this->sError = "";
        $this->bHasNoErrors = false;
    }

    abstract protected function validateField();

    private function checkErrors() {
        $this->bHasNoErrors = $this->validateField();
    }

    public function getValidation() {
        $this->checkErrors();
        return $this->bHasNoErrors;
    }

    protected function getField() {
        return $this->sField;
    }

    protected function setError($sError) {
        $this->sError .= "$sError";
    }

    public function resetField($sField) {
        $this->sField = $sField;
    }

    public function getError() {
        return $this->sError;
    }

    public function __destruct() {

    }

    private $sField;
    private $sError;
    private $bHasNoErrors;

}

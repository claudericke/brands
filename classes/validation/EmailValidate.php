<?php

/**
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 *
 * @copyright (c) 2013, Lebogang Ratsoana
 *
 * @uses abstractvalidation class to validate email field
 *
 * 07 April 2013
 */
/* defined('ROOT') || exit("ROOT is not defined");

  spl_autoload_register(function ($sClass) {
  if (stripos($sClass, "valid") !== false)
  require_once ROOT . 'classes/validation/' . $sClass . '.php';
  else
  require_once ROOT . 'classes/' . $sClass . '.php';
  }); */

class EmailValidate extends AbstractValidation {

    protected function validateField() {
        if (!filter_var($this->getField(), FILTER_VALIDATE_EMAIL)) {
            $this->setError(" not valid");
            return FALSE;
        }
        return true;
    }

}

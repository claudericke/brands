<?php

/**
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 *
 * @copyright (c) 2013, Lebogang Ratsoana
 *
 * @uses abstractvalidation class to validate date field
 *
 * 07 April 2013
 */
class DateValidate extends AbstractValidation {

    protected function validateField() {
        $aDate = date_parse($this->getField());
        $iYear = $aDate['year'];
        $iMonth = $aDate['month'];
        $iDay = $aDate['day'];

        if ($iDay < 10)
            $iDay = "0$iDay";
        if ($iMonth < 10)
            $iMonth = "0$iMonth";

        $dDate = date("d F Y", mktime(0, 0, 0, $iMonth, $iDay, $iYear));
        if ($dDate == '01 January 1970') {
            $this->setError(" specified is invalid.");
            return FALSE;
        }
        return TRUE;
    }

}

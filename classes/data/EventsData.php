<?php

defined('ROOT') || header("Location: /error?errorCode=500");

/**
 * Fetches and returns events data
 *
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 */
class EventsData extends AbstractData {

    public function __construct($sEventsTable = "events") {
        parent::__construct($sEventsTable);
    }

    /**
     * Takes datetime as a parameter and returns all the events for that date
     *
     * @param datetime $sEventsDate
     * @param int $iCompanyId Id of the company which these events belong
     */
    public function setEventDataByDate($sEventsDate, $iCompanyId = 0) {
        $sExtras = "";
        $this->aData = array();
        if ($iCompanyId > 0)
            $sExtras = " AND companyid=$iCompanyId";

        $sStartDate = date("Y-m-d H:i:s", strtotime($sEventsDate . " 00:00:09"));
        $sEndDate = date("Y-m-d H:i:s", strtotime($sEventsDate . " 23:59:59"));
        $sQuery = "SELECT * FROM {$this->sTable} WHERE startdate between '$sStartDate' AND '$sEndDate'$sExtras ORDER BY datecreated DESC";
        $aResult = DatabaseConnection::fetchData($sQuery);
        if (is_array($aResult) && count($aResult) > 0) {
            $this->aData = $aResult;
        }
    }

}

<?php

defined('ROOT') || header("Location: /error?errorCode=500");

/**
 * Fetches and returns events data
 *
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 */
class HelpdeskData extends AbstractData {

    public function __construct($sEventsTable = "br_helpdesk") {
        parent::__construct($sEventsTable);
    }

}

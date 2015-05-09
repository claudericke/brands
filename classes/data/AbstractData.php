<?php

defined('ROOT') || header("Location: /error?errorCode=500");

/**
 * Defines common methods used by classes that fetch data from database
 *
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 */
class AbstractData {

    private $iId;
    protected $aData;
    protected $oPDO;
    protected $sTable;

    /**
     * Takes and sets database table name, from which data will be read, as a parameter
     *
     * @param string $sTable
     */
    public function __construct($sTable = "users") {
        $this->iId = 0;
        $this->aData = array();
        $this->oPDO = DatabaseConnection::getConnection()->getConnInstance();
        $this->sTable = $sTable;
    }

    /**
     * Fetches array from database using the id specified in parameters
     *
     * @param int $iId
     */
    public function setDataById($iId) {
        $this->aData = array();
        $this->changeId($iId);
        $sQuery = "SELECT * FROM {$this->sTable} WHERE id=$iId LIMIT 1";

        $aResult = DatabaseConnection::fetchData($sQuery);

        if (count($aResult) > 0) {
            $this->aData = $aResult;
        }
    }

    /**
     * Takes id and updates the time the update took place
     *
     * @param int $iId
     */
    public function updateLastUpdated($iId) {
        $sLastUpdated = date("Y-m-d H:i:s");
        $sQuery = "UPDATE {$this->sTable} SET dateupdated='$sLastUpdated' WHERE id=$iId";
        try {
            $this->oPDO->exec($sQuery);
        } catch (PDOException $oException) {
            LogErrors::logError($oException->getCode(), $oException->getMessage());
            $sServerPage = "/error?errorCode=" . $oException->getCode();
            header("Location: $sServerPage");
        }
    }

    /**
     * Changes the id in the class
     *
     * @param int $iId
     */
    public function changeId($iId) {
        $this->iId = $iId;
    }

    /**
     * Returns the data set by the methods above
     *
     * @return array
     */
    public function getData() {
        return $this->aData;
    }

    public function createInsertQuery() {
        require_once ROOT . 'tables/tables.php';
        $aDatabaseFields = array();
        foreach ($aTables as $sTableName => $aTable) {
            foreach ($aTable as $aField) {
                $aDatabaseFields[$sTableName][] = $aField[0];
            }
        }

        $aCurrentTable = $aDatabaseFields[$this->sTable];
        $sDatabaseFields = "`" . implode("`,`", $aCurrentTable) . "`";
        $sTempValues = Registration::setTempValues(count($aCurrentTable));

        return "INSERT INTO $this->sTable ($sDatabaseFields) VALUES ($sTempValues)";
    }

}

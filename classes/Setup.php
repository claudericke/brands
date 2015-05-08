<?php

/**
 * Creates all the tables that will be needed by the system
 *
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 */
defined('ROOT') || header("Location: /error?errorCode=500");

class Setup {

    private $aTables;
    private $bHasError;
    private $aErrorMessages;
    private $oPdo;

    public function __construct() {
        $this->setTables();
        $this->bHasError = false;
        $this->aErrorMessages = array();
        $this->oPdo = DatabaseConnection::getConnection()->getConnInstance();
        if (file_exists(ROOT . "configuration.txt")) {
            $this->bHasError = true;
            $this->aErrorMessages[] = "Already Configured.";
        } else {
            $oFp = fopen(ROOT . "configuration.txt", "wb");
            fwrite($oFp, "Already Installed");
            fclose($oFp);
        }
    }

    public function columnExists($sTable, $sColumnName) {
        $sQuery = "SELECT $sColumnName FROM $sTable LIMIT 1";
        try {
            $aResult = $this->oPdo->query($sQuery)
                    ->fetchAll(PDO::FETCH_ASSOC);
            if (count($aResult) > 0)
                return true;

            return false;
        } catch (PDOException $oPdoException) {
            unset($oPdoException);
            return false;
        }
    }

    public function setTables() {
        require_once ROOT . 'tables/tables.php';
        if (!is_array($aTables)) {
            $this->bHasError = true;
            $this->aErrorMessages[] = "settables expects the parameters to be an array, please refer to tables.php inside tables/";
        } else {
            $this->aTables = $aTables;
        }
    }

    public function createtables() {
        if (!is_array($this->aTables) || empty($this->aTables) || $this->bHasError) {
            $this->bHasError = true;
            $this->aErrorMessages[] = "Tables could not be created because there were errors before createtables().";
            //LogErrors::logError("PHP", "Tables could not be created because there were errors before createtables().");
        } else {
            foreach ($this->aTables as $sTableName => $aTable) {

                $sQuery = "CREATE TABLE IF NOT EXISTS $sTableName (
                                                    id int(11) unsigned NOT NULL AUTO_INCREMENT,
                                                    PRIMARY KEY (id)
                                                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

                try {
                    $this->oPdo->query($sQuery);
                } catch (PDOException $oPdoException) {
                    $this->bHasError = true;
                    $this->aErrorMessages[] = $oPdoException->getMessage();
                    //LogErrors::logError($oPdoException->getCode(), $oPdoException->getMessage());
                }

                if (!$this->bHasError) {
                    foreach ($aTable as $aTableFields) {
                        //echo "$sTableName -> $aTableFields[0], $aTableFields[2], $aTableFields[3] <br/><br/>";
                        $this->addColumn($sTableName, $aTableFields[0], $aTableFields[2], $aTableFields[3]);
                    }
                }
            }
        }
    }

    public function addColumn($sTable, $sColumnName, $sType, $iLength = 255) {

        $bExists = $this->columnExists($sTable, $sColumnName);

        if (!$this->bHasError && !$bExists) {
            if ($sType == "int") {
                $sQuery = "ALTER TABLE  $sTable ADD  $sColumnName $sType( $iLength ) UNSIGNED NOT NULL";
            } else if ($sType == "tinyint") {
                $sQuery = "ALTER TABLE  $sTable ADD  $sColumnName $sType( $iLength ) NOT NULL";
            } elseif (($sType == "text") || ($sType == "date" || $sType == "datetime" || $sType == "timestamp")) {
                $sDefault = $sType == "timestamp" ? " DEFAULT NOW()" : "";
                $sQuery = "ALTER TABLE  $sTable ADD  $sColumnName $sType NOT NULL$sDefault";
            } elseif ($sType == "enum") {
                $sDefault = trim(strstr($iLength, ',', true));
                $sQuery = "ALTER TABLE  $sTable ADD  $sColumnName $sType($iLength) NOT NULL DEFAULT $sDefault";
            } else {
                $sQuery = "ALTER TABLE  $sTable ADD  $sColumnName $sType( $iLength ) NOT NULL DEFAULT ''";
            }

            echo $sQuery . "<br/><br/>";


            try {
                $this->oPdo->query($sQuery);
            } catch (PDOException $oPdoException) {
                $this->bHasError = true;
                $this->aErrorMessages[] = $oPdoException->getMessage();
                //LogErrors::logError($oPdoException->getCode(), $oPdoException->getMessage());
            }
        }
    }

    public function removeColumn($sTable, $sColumnName) {

        $bExists = $this->columnexists($sTable, $sColumnName);

        if (!$this->bHasError && $bExists) {
            $sQuery = "ALTER TABLE $sTable DROP $sColumnName";
            try {
                $this->oPdo->query($sQuery);
            } catch (PDOException $oPdoException) {
                $this->bHasError = true;
                $this->aErrorMessages[] = $oPdoException->getMessage();
                //LogErrors::logError($oPdoException->getCode(), $oPdoException->getMessage());
            }
        }
    }

    public function hasErrors() {
        return $this->bHasError;
    }

    public function geterrors() {
        return $this->aErrorMessages;
    }

}

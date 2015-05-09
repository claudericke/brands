<?php

/**
 * A singleton class that connects you to the database and returns an instance of itself
 *
 * @author Lebogang Ratsoana
 *
 * @property DatabaseConnection $oDatabaseConnection An instance of this class
 * @property PDO $oDbConn An object of PDO
 * @property array $aDatabaseConnectionDetails Array that stores all the database connections
 */
class DatabaseConnection {

    private static $oDatabaseConnection;
    private $oDbConn;
    private $aDatabaseConnectionDetails;

    private function __construct() {

        $this->aDatabaseConnectionDetails["localhost"] = array("host" => "localhost", "username" => "root", "password" => "28326084", "db" => "brands");

        $sCurrentHost = $this->determineHost();

        try {
            $sPdoConnection = 'mysql:host=' . $this->aDatabaseConnectionDetails[$sCurrentHost]["host"];
            $this->oDbConn = new PDO($sPdoConnection, $this->aDatabaseConnectionDetails[$sCurrentHost]["username"], $this->aDatabaseConnectionDetails[$sCurrentHost]["password"]);
            $this->oDbConn->exec("SET CHARACTER SET utf8");
            $this->oDbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->oDbConn->query("CREATE DATABASE IF  NOT EXISTS {$this->aDatabaseConnectionDetails[$sCurrentHost]["db"]}");
            $this->oDbConn->query("USE {$this->aDatabaseConnectionDetails[$sCurrentHost]["db"]}");

            $this->oDbConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->oDbConn->setAttribute(PDO::ATTR_PERSISTENT, true);
        } catch (PDOException $oException) {
            exit("Database connection failed because: " . $oException->getMessage());
        }
    }

    /**
     * Checks, sets and returns the host name
     *
     * @return string
     */
    private function determineHost() {
        if ($_SERVER["HTTP_HOST"] == "localhost" || stripos($_SERVER['SERVER_NAME'], ".local") !== false)
            $sHost = "localhost";
        else if (stripos($_SERVER['SERVER_NAME'], "twiss.co.za") !== false)
            $sHost = "twiss";
        else
            $sHost = "other";

        return $sHost;
    }

    /**
     * If instance of this does not exist yet, getConnection creates it. Returns an instance of this class.
     *
     * @return DatabaseConnection
     */
    public static function getConnection() {

        if (!isset(self::$oDatabaseConnection)) {
            $className = __CLASS__;
            self::$oDatabaseConnection = new $className;
        }
        return self::$oDatabaseConnection;
    }

    /**
     * Returns an instance of PDO object
     * @return PDO
     */
    public function getConnInstance() {
        return $this->oDbConn;
    }

    /**
     * Cleans up after itself
     */
    public function __destruct() {
        $this->oDbConn = NULL;
        self::$oDatabaseConnection = NULL;
    }

    /**
     * Fetches data from database based on the query supplied in the parameters
     *
     * @param string $sQuery
     * @return array
     */
    public static function fetchData($sQuery) {
        try {
            $aResult = self::getConnection()->getConnInstance()->query($sQuery)
                    ->fetchAll(PDO::FETCH_ASSOC);

            return $aResult;
        } catch (PDOException $oException) {
            LogErrors::logError($oException->getCode(), $oException->getMessage());
            $sServerPage = "/error?errorCode=" . $oException->getCode();
            header("Location: $sServerPage");
        }
    }

    /**
     * Inserts data into the database and returns the id that was created after insert
     *
     * @param string $sQuery
     * @param array $aData
     * @return int
     */
    public static function insertData($sQuery, $aData) {
        try {
            self::getConnection()->getConnInstance()->beginTransaction();
            $oQuery = self::getConnection()->getConnInstance()->prepare($sQuery);
            $oQuery->execute(array_values($aData));
            $iId = self::getConnection()->getConnInstance()->lastInsertId();
            self::getConnection()->getConnInstance()->commit();

            return $iId;
        } catch (PDOException $oException) {
            LogErrors::logError($oException->getCode(), $oException->getMessage());
            self::getConnection()->getConnInstance()->rollBack();
            //echo $oException->getMessage();
            $sServerPage = "/error?errorCode=" . $oException->getCode() . "&message=" . $oException->getMessage() . urlencode($sQuery . print_r($aData, true));
            header("Location: $sServerPage");
        }

        return 0;
    }

}

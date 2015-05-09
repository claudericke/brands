<?php

/**
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 *
 * @copyright (c) 2013, Lebogang Ratsoana
 *
 * @uses sha1(),md5() functions to generate hashed keys
 *
 * 07 April 2013
 */
class HashKeys {

    private static $oHashKeys;
    private $sSaltPostEncryption;
    private $sSaltPreEncryption;
    private $sKey;

    private function __construct($sKey) {
        $this->changeKey($sKey);
        $this->sSaltPostEncryption = "lojn8958t7*&^8";
        $this->sSaltPreEncryption = "spjd4852bsKF4";
    }

    public static function getHashInstance($sKey) {
        if (empty(self::$oHashKeys)) {
            self::$oHashKeys = new self($sKey);
        }
        return self::$oHashKeys;
    }

    public function changeKey($sKey) {
        $this->sKey = $sKey;
    }

    private function hashKey() {
        $this->sKey = $this->sSaltPreEncryption . sha1(md5($this->sKey)) . $this->sSaltPostEncryption;
    }

    public function getHashedKey() {
        $this->hashKey();
        return $this->sKey;
    }

}

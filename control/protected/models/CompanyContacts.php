<?php

class CompanyContacts extends CActiveRecord {
    /**
     * The followings are the available columns in table 'BR_CompanyDetails':
     * @var integer $ID
     * @var integer $CompanyID
     * @var string $PhysicalAddress
     * @var string $PostalAddress
     * @var string $PreferredLanguage
     * @var string $BrandsNumber
     * @var string $AccountNumber
     * @var int $Subscription
     * @var int $ThirdpartyMarketing
     */

    /**
     * Returns the static model of the specified AR class.
     * @return CActiveRecord the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{CompanyContacts}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('PhysicalAddress, PostalAddress, BrandsNumber, AccountNumber', 'length', 'max' => 255),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'CompanyID' => array(self::BELONGS_TO, 'CompanyDetails', 'ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ID' => 'Id',
            'CompanyID' => 'User Id',
            'PhysicalAddress' => 'Physical Address',
            'PostalAddress' => 'Postal Address',
            'PreferredLanguage' => 'Preferred Language',
            'BrandsNumber' => 'Brand Number',
            'AccountNumber' => 'Account Number',
            'PreferredCorrespondence' => 'Preferred Correspondence',
            'Subscription' => 'Subscribe?',
            'ThirdpartyMarketing' => 'Receive third party marketing?',
        );
    }

}

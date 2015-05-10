<?php

class CompanyDetails extends CActiveRecord {
    /**
     * The followings are the available columns in table 'BR_CompanyDetails':
     * @var integer $ID
     * @var integer $UserID
     * @var string $CompanyName
     * @var string $TradingName
     * @var string $ProductsAndServices
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
        return '{{CompanyDetails}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('CompanyName, TradingName, ProductsAndServices', 'required'),
            array('CompanyName, TradingName, ProductsAndServices', 'length', 'max' => 255),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'UserID' => array(self::BELONGS_TO, 'User', 'id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'UserID' => 'User Id',
            'CompanyName' => 'Company Name',
            'TradingName' => 'Trading Name',
            'ProductsAndServices' => 'Products And Services',
        );
    }

}

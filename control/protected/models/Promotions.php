<?php

class Promotions extends CActiveRecord {
    /**
     * The followings are the available columns in table 'BR_CompanyDetails':
     * @var integer $id
     * @var integer $CompanyID
     * @var string $Title
     * @var integer $Description
     * @var integer $DocumentId
     * @var integer $PromotionImageId
     * @var integer $Active
     * @var string $StartDate
     * @var string $EndDate
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
        return '{{promotions}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Title,Description,StartDate,EndDate', 'required'),
            array('Title', 'length', 'max' => 255),
            array('CompanyID,Title,Description,PromotionImageId,Active,StartDate,EndDate', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'CompanyID' => array(self::BELONGS_TO, 'companydetails', 'id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'CompanyID' => 'Company Id',
            'Title' => "Title",
            'Description' => 'Description',
            'Active' => 'Active',
            'StartDate' => 'Promotion Start Date',
            'EndDate' => 'Promotion End Date',
            'PromotionImageId' => 'Promotion Image Id',
        );
    }

}

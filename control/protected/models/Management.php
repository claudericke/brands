<?php

class Management extends CActiveRecord {
    /**
     * The followings are the available columns in table 'BR_CompanyDetails':
     * @var integer $id
     * @var integer $CompanyID
     * @var string $Title
     * @var string $Name
     * @var string $Surname
     * @var string $Position
     * @var integer $ManagementImageId
     * @var string $Email
     * @var string $ContactNumber
     * @var string $WebAddress
     * @var string $Description
     * @var timestamp $DateCreated
     * @var datetime $DateUpdated
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
        return '{{management}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Name,Surname,Email,ContactNumber,Description', 'required'),
            array('Name,Surname,Email,ContactNumber,Position', 'length', 'max' => 255),
            array('CompanyID,Title, Name, Surname, Position, ManagementImageId, Email, ContactNumber, WebAddress, Description, DateCreated, DateUpdated', 'safe'),
            array('Email', 'email'),
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
            'Name' => 'Name',
            'Surname' => 'Surname',
            'Position' => 'Position',
            'Email' => 'Email Address',
            'ContactNumber' => 'Contact Number',
            'WebAddress' => 'Web Address',
            'Description' => 'Description',
            'ManagementImageId' => 'Management Image Id'
        );
    }

}

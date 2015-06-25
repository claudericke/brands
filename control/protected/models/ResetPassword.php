<?php

class ResetPassword extends CActiveRecord {

    /**
     * The followings are the available columns in table 'BR_CompanyDetails':
     * @var integer $id
     * @var string $Email
     * @var string $Password
     * @var string $DateUpdated
     */
    public $ConfirmPassword;

    protected function beforeSave() {
        parent::beforeSave();
        $oHashObj = HashKeys::getHashInstance($this->Password);
        $this->Password = $oHashObj->getHashedKey();
        return true;
    }

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
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Password,ConfirmPassword', 'required'),
            array('ConfirmPassword', 'compare', 'compareAttribute' => 'Password',),
            array('Password', 'length', 'min' => 6, 'max' => 255),
            array('Password,DateUpdated', 'safe'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Password' => 'Password',
            'ConfirmPassword' => 'Confirm Password',
        );
    }

}

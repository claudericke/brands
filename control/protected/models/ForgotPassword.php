<?php

class ForgotPassword extends CActiveRecord {

    /**
     * The followings are the available columns in table 'BR_CompanyDetails':
     * @var integer $id
     * @var integer $UserID
     * @var string $Email
     * @var string $PasswordToken
     * @var string $Active
     * @var string $DateActivated
     * @var string $DateCreated
     * @var string $DateUpdated
     */
    protected function beforeSave() {
        parent::beforeSave();
        //$this->PasswordToken = $this->hashPassword($this->Email);
        $oHashObj = HashKeys::getHashInstance($this->Email);
        $this->PasswordToken = $oHashObj->getHashedKey();
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
        return '{{forgotpassword}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Email', 'required'),
            array('Email', 'length', 'max' => 255),
            array('Email', 'email'),
            array('UserID,Email,PasswordToken,Active,DateActivated,DateCreated,DateUpdated', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'UserID' => array(self::BELONGS_TO, 'user', 'id'),
        );
    }

    public function sendActivation($sCredentials, $sTemplate = NULL) {

        $sEol = PHP_EOL;
        $sMailheaders = "From: no-reply@brands$sEol";
        $sMailheaders .= "MIME-Version: 1.0$sEol";
        $sMailheaders .= "Content-Type: text/html; charset=ISO-8859-1$sEol";
        $sMailheaders .= "Reply-To: Brands Admin <admin@brands.co.zw>";
        $sAdditionalheader = "-fwebmaster@brands.com";

        $sActivationLink = Yii::app()->getBaseUrl(true) . "/login/resetpassword?token=" . urlencode($this->PasswordToken);
        $sMailBody = "<br><br> <p>Please click <a href='$sActivationLink'>here</a> to reset password on Brands.</p> <p>If clicking did not work, please copy this: "
                . "'$sActivationLink' into your browser.</p> <p>Kindly ignore if you did not request any password change</p>";

        if (!is_null($sTemplate)) {
            $aReplaceables = array("__url__", "__subject__", "__credentials__", "__mail__");
            $aReplaceWith = array(str_replace("control", "", Yii::app()->getBaseUrl(true)), "Brands Password Reset", $sCredentials, $sMailBody);
            $sMailBody = str_replace($aReplaceables, $aReplaceWith, $sTemplate);
        }
        return mail($this->Email, "Brands Password Reset", $sMailBody, $sMailheaders, $sAdditionalheader);
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Email' => 'Email',
            'Active' => 'Active',
        );
    }

}

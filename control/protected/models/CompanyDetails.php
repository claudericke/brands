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
    protected function beforeValidate() {
        if (!is_array($this->ProductsAndServices))
            $this->ProductsAndServices = array();
        $this->ProductsAndServices = CJSON::encode($this->ProductsAndServices);

        return parent::beforeValidate();
    }

    protected function afterFind() {
        parent::afterFind();
        $this->ProductsAndServices = CJSON::decode($this->ProductsAndServices);
        if (!is_array($this->ProductsAndServices))
            $this->ProductsAndServices = array();
    }

    protected function afterSave() {
        parent::afterSave();
        $this->ProductsAndServices = CJSON::decode($this->ProductsAndServices);
        if (!is_array($this->ProductsAndServices))
            $this->ProductsAndServices = array();
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
        return '{{companydetails}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('CompanyName, TradingName, ProductsAndServices', 'required'),
            array('CompanyName, TradingName, ProductsAndServices, Description, Website', 'length', 'max' => 255),
            array('CompanyName, TradingName, Description, Website, Industry, ProductsAndServices, UserID', 'safe'),
            array('Website', 'url', 'defaultScheme' => 'http')
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
            'Website' => 'Website URL',
            'Industry' => 'Industry',
            'Description' => 'Description(255 charecters max)',
            'ProductsAndServices' => 'Products And Services',
        );
    }

    public function getCategoryOptions() {
        return array(
            array('id' => 111, 'text' => 'Pentecostal', 'Church'),
            array('id' => 112, 'text' => 'Customary', 'Church'),
            array('id' => 113, 'text' => 'Anglican', 'Church'),
            array('id' => 114, 'text' => 'Catholic', 'Church'),
            array('id' => 115, 'text' => 'Preschool', 'Education'),
            array('id' => 116, 'text' => 'Primary', 'Education'),
            array('id' => 117, 'text' => 'Secondary', 'Education'),
            array('id' => 118, 'text' => 'College', 'Education'),
            array('id' => 119, 'text' => 'Tertiary', 'Education'),
            array('id' => 120, 'text' => 'University', 'Education'),
            array('id' => 121, 'text' => 'Saloon', 'S.M.E'),
            array('id' => 122, 'text' => 'Barber', 'S.M.E'),
            array('id' => 123, 'text' => 'Spa', 'S.M.E'),
            array('id' => 124, 'text' => 'Boutique', 'S.M.E'),
            array('id' => 125, 'text' => 'Plumber', 'S.M.E'),
            array('id' => 126, 'text' => 'Builder', 'S.M.E'),
            array('id' => 127, 'text' => 'Other', 'S.M.E'),
            array('id' => 128, 'text' => 'Healthcare', 'Healthcare'),
            array('id' => 129, 'text' => 'Hospital', 'Healthcare'),
            array('id' => 130, 'text' => 'Clinic', 'Healthcare'),
            array('id' => 131, 'text' => 'Pharmacy', 'Healthcare'),
            array('id' => 132, 'text' => 'Rehabilitation Centre', 'Healthcare'),
            array('id' => 133, 'text' => 'Restaurant', 'Food Outlets'),
            array('id' => 134, 'text' => 'Food Court', 'Food Outlets'),
            array('id' => 136, 'text' => 'Bank', 'Financial Institutes'),
            array('id' => 137, 'text' => 'Micro Finance', 'Financial Institutes'),
            array('id' => 138, 'text' => 'Investors', 'Financial Institutes'),
            array('id' => 139, 'text' => 'Vehicle', 'Auto Indusrty'),
            array('id' => 140, 'text' => 'Panel beater', 'Auto Indusrty'),
            array('id' => 141, 'text' => 'Car sale', 'Auto Indusrty'),
            array('id' => 142, 'text' => 'Car breaker', 'Auto Indusrty'),
            array('id' => 143, 'text' => 'Spray Painter', 'Auto Indusrty'),
            array('id' => 144, 'text' => 'Real estate', 'Property'),
            array('id' => 145, 'text' => 'Cooperative', 'Property'),
            array('id' => 146, 'text' => 'Land developers', 'Property'),
            array('id' => 147, 'text' => 'Airport', 'Airport / Airline'),
            array('id' => 148, 'text' => 'Airline', 'Airport / Airline'),
            array('id' => 149, 'text' => 'Airport logistics', 'Airport / Airline'),
            array('id' => 150, 'text' => 'Internet Service Provider', 'Internet Service Provider'),
            array('id' => 151, 'text' => 'Taxis', 'Travel'),
            array('id' => 152, 'text' => 'Buses', 'Travel'),
            array('id' => 153, 'text' => 'Travelling Agent', 'Travel'),
            array('id' => 154, 'text' => 'Car Rental', 'Travel'),
            array('id' => 155, 'text' => 'Boat', 'Travel'),
            array('id' => 156, 'text' => 'Telecoms', 'Telecoms'),
            array('id' => 157, 'text' => 'Children\'s Home', 'Orphanage / Support Center'),
            array('id' => 158, 'text' => 'Old age Home', 'Orphanage / Support Center'),
            array('id' => 159, 'text' => 'Psychiatric Ward', 'Orphanage / Support Center'),
            array('id' => 160, 'text' => 'Indoor Bar', 'Night Club'),
            array('id' => 161, 'text' => 'Open Bar', 'Night Club'),
            array('id' => 162, 'text' => 'Clubs', 'Night Club'),
            array('id' => 163, 'text' => 'Burial Services', 'Burial Services'),
            array('id' => 164, 'text' => 'Funeral Parlour', 'Burial Services'),
            array('id' => 165, 'text' => 'Funeral Agent', 'Burial Services'),
            array('id' => 166, 'text' => 'Tombstones supplier', 'Burial Services'),
            array('id' => 167, 'text' => 'Grocery Store', 'Retail Store'),
            array('id' => 168, 'text' => 'Supermarket', 'Retail Store'),
            array('id' => 169, 'text' => 'Wholesaler', 'Retail Store'),
            array('id' => 170, 'text' => 'Retail store', 'Retail Store'),
            array('id' => 171, 'text' => 'Building material', 'Hardware'),
            array('id' => 172, 'text' => 'Domestic Accessories', 'Hardware'),
            array('id' => 173, 'text' => 'Appliances', 'Hardware'),
            array('id' => 174, 'text' => 'Cell Phones', 'Electrical Devices and Accessories'),
            array('id' => 175, 'text' => 'Computers', 'Electrical Devices and Accessories'),
            array('id' => 176, 'text' => 'Household Appliances', 'Electrical Devices and Accessories'),
        );
    }

}

<?php

class ManageImages extends CActiveRecord {

    /**
     * The followings are the available columns in table 'BR_CompanyDetails':
     * @var integer $id
     * @var string $originalname
     * @var string $newname
     * @var string $path
     */
    private $fQuality;
    public $image;

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
        return '{{images}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('originalname, newname, path', 'length', 'max' => 255),
            array('originalname,newname,path', 'safe'),
            array('image', 'file', 'types' => 'jpg, gif, png', 'maxSize' => 1020 * 500, 'tooLarge' => 'Image cannot be greater than 500kb in size'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'originalname' => 'Original Image Name',
            'newname' => 'New Image name',
            'image' => 'Logo/Image',
            'path' => 'Path to which image is saved',
        );
    }

    private function setQuality($sImageType) {
        $this->fQuality = 100;

        if ($sImageType == "png" || $sImageType == "gif") {
            $this->fQuality = 9;
        }
    }

    public function resize($sUploadedImage, $NewDir, $MaxWidth, $MaxHeight) {

        list($ImageWidth, $ImageHeight, $TypeCode) = getimagesize($sUploadedImage);
        $ImageType = ($TypeCode == 1 ? "gif" : ($TypeCode == 2 ? "jpeg" : ($TypeCode == 3 ? "png" : FALSE)));
        $CreateFunction = "imagecreatefrom" . $ImageType;
        $OutputFunction = "image" . $ImageType;

        $this->setQuality($ImageType);
        if ($ImageType) {
            $Ratio = ($ImageHeight / $ImageWidth);
            $ImageSource = $CreateFunction($sUploadedImage);
            if ($ImageWidth > $MaxWidth || $ImageHeight > $MaxHeight) {
                if ($ImageWidth > $MaxWidth) {
                    $ResizedWidth = $MaxWidth;
                    $ResizedHeight = $ResizedWidth * $Ratio;
                } else {
                    $ResizedWidth = $ImageWidth;
                    $ResizedHeight = $ImageHeight;
                }
                if ($ResizedHeight > $MaxHeight) {
                    $ResizedHeight = $MaxHeight;
                    $ResizedWidth = $ResizedHeight / $Ratio;
                }
            } else {
                $ResizedWidth = $ImageWidth;
                $ResizedHeight = $ImageHeight;
                $ResizedImage = $ImageSource;
            }

            $ResizedImage = imagecreatetruecolor($ResizedWidth, $ResizedHeight);
            $white = imagecolorallocate($ResizedImage, 255, 255, 255);
            imagecolortransparent($ResizedImage, $white);
            imagealphablending($ResizedImage, false);
            imagesavealpha($ResizedImage, true);
            imagecopyresampled($ResizedImage, $ImageSource, 0, 0, 0, 0, $ResizedWidth, $ResizedHeight, $ImageWidth, $ImageHeight);

            $OutputFunction($ResizedImage, $NewDir, $this->fQuality);
            return true;
        } else {
            return false;
        }
    }

}

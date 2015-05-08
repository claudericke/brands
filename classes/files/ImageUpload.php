<?php

class ImageUpload extends AbstractFileUpload {

    private $fQuality;
    private $aAllowedFileTypes = array("jpg", "jpeg", "png", "gif");

    private function setQuality() {
        $this->fQuality = 100;

        if ($this->file_type == "png" || $this->file_type == "gif") {
            $this->fQuality = 9;
        }
    }

    public function validateType() {
        if (in_array($this->file_type, $this->aAllowedFileTypes) === false) {
            $this->error = true;
            $this->seterror("Image not uploaded, type not supported. Supported images: " . implode(",", $this->aAllowedFileTypes) . " only");
        } else {
            $this->error = false;
        }
    }

    public function validateSize() {
        $size = $this->getFilesize();
        if ($size > (self::$Max_Size * 1024)) {
            $this->error = true;
            $this->seterror("Image not uploaded because it's size has exceeded the maximum file upload size of  " . (self::$Max_Size / 1024) . "MB");
        } else {
            $this->error = false;
        }
    }

    public function resize($NewDir, $MaxWidth, $MaxHeight) {
        $this->setQuality();
        if (!is_dir($NewDir)) {
            mkdir($NewDir);
        }

        list($ImageWidth, $ImageHeight, $TypeCode) = getimagesize($this->upload_dir . $this->new_file_name);
        $ImageType = ($TypeCode == 1 ? "gif" : ($TypeCode == 2 ? "jpeg" : ($TypeCode == 3 ? "png" : FALSE)));
        $CreateFunction = "imagecreatefrom" . $ImageType;
        $OutputFunction = "image" . $ImageType;

        if ($ImageType) {
            $Ratio = ($ImageHeight / $ImageWidth);
            $ImageSource = $CreateFunction($this->upload_dir . $this->new_file_name);
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

            $OutputFunction($ResizedImage, $NewDir . $this->new_file_name, $this->fQuality);
            return true;
        } else {
            return false;
        }
    }

}

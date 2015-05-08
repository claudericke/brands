<?php

class FileFactory {

    public function __construct($sClassname = "Image") {
        $this->setClass($sClassname);
        $this->aFiles = array();
        $this->oFileObject = NULL;
        $this->aErrorMessage = array();
        $this->bHasErrors = false;
    }

    public function setClass($sClassName) {
        $this->sClassName = $sClassName;
        $sNewClassName = $this->sClassName . "Upload";
        $sDirectory = ROOT . "classes" . DIRECTORY_SEPARATOR . "files";
        if (is_dir($sDirectory) and file_exists($sDirectory . DIRECTORY_SEPARATOR . $sNewClassName . ".php")) {
            $this->sClassName = $sClassName;
            $this->bHasErrors = false;
        } else {
            $this->bHasErrors = true;
            $this->setError("$this->sClassName Does not exist yet");
            $this->sClassName = NULL;
        }
    }

    private function createObjects() {
        $sClassName = $this->sClassName . "Upload";
        return new $sClassName;
    }

    public function uploadFile($field_name, $upload_dir, $resize_width = 200, $resize_height = 200) {
        if (!isset($_FILES[$field_name]['name'])) {
            $this->bHasErrors = true;
            $this->setError("The field name you specified was not sent with the form, make sure you set enctype='multipart/form-data' in your form tag");
        }

        if ($this->bHasErrors) {
            $this->aFiles ["message"] = $this->getErrorMessages() . "<br/>"; //Output error message if there were any errors found
            $this->aFiles ["name"] = "";
            $this->aFiles ["original_name"] = "";
            $this->aFiles ["directory"] = "/";
            $this->aFiles ["error"] = $this->bHasErrors;
        } else {
            $this->oFileObject = $this->createObjects();
            $this->oFileObject->setFieldname($field_name); //set field name to that of the file upload field."
            $this->oFileObject->setUploadDir($upload_dir); //specify which directory the file should be uploaded to

            $this->oFileObject->uploadFile(); //then upload the file
            if ($this->oFileObject->getError()) {//check if there were errors returned when file was uploaded
                $this->aFiles ["message"] = $this->oFileObject->getErrorMessages() . "<br/>"; //Output error message if there were any errors found
                $this->aFiles ["name"] = "";
                $this->aFiles ["original_name"] = "";
                $this->aFiles ["directory"] = "/";
                $this->aFiles ["error"] = $this->bHasErrors;

                $this->setError("File was not uploaded because: " . $this->oFileObject->getErrorMessages());
            } else {
                $this->aFiles ["message"] = $this->oFileObject->getSuccess(); //output success message if file uploaded successfully
                $this->aFiles ["name"] = $this->oFileObject->getNewname();
                $this->aFiles ["original_name"] = $this->oFileObject->getOriginalname();
                $this->aFiles ["directory"] = $this->oFileObject->getUploadDir();
                $this->aFiles ["error"] = $this->bHasErrors;

                if ($this->sClassName == "Image") {
                    //Then resize if file is an Image
                    $this->oFileObject->resize($this->oFileObject->getUploadDir() . "/medium/", $resize_width, $resize_height);
                    //$this->oFileObject->resize($this->oFileObject->getUploadDir() . "/small/", 120, 120);
                }
            }
        }
        return $this->aFiles;
    }

    private function setError($sError) {
        $this->aErrorMessage[] = "<li>$sError</li>\n";
    }

    public function getError() {
        return $this->bHasErrors;
    }

    public function getErrorMessages() {
        $sError = "<ul>";
        $sError .= implode("\n", $this->aErrorMessage);
        $sError .= "</ul>";
        return $sError;
    }

    private $oFileObject;
    private $sClassName;
    private $bHasErrors;
    private $aErrorMessage;
    private $aFiles;

}

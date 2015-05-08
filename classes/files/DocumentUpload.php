<?php

class DocumentUpload extends AbstractFileUpload {

    private $aAllowedFileTypes = array("doc", "docx", "pdf", "xls", "xlsx", "csv", "txt");

    public function validateType() {
        if (in_array($this->file_type, $this->aAllowedFileTypes) === false) {
            $this->error = true;
            $this->seterror("Document not uploaded, type not supported. Supported types are : ." . implode(", .", $this->aAllowedFileTypes) . " documents only");
        } else {
            $this->error = false;
        }
    }

    public function validateSize() {
        $size = $this->getFilesize();
        if ($size > (self::$Max_Size * 1024)) {
            $this->error = true;
            $this->seterror("Document not uploaded because it's size has exceeded the maximum file upload size of " . (self::$Max_Size / 1024) . "MB");
        } else {
            $this->error = false;
        }
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebUser
 *
 * @author phpDude
 */
class WebUser extends CWebUser {

    //put your code here
    public function getUserMainImage($sThumb = "") {
        $oCompany = CompanyDetails::model()->find('UserID=:UserID', array(':UserID' => Yii::app()->user->id));
        $sImage = Yii::app()->request->baseUrl . "/images/user.png";
        if ($oCompany->companylogoid > 0) {
            $oManageImages = ManageImages::model()->find('id=:id', array(':id' => $oCompany->companylogoid));
            if (!empty($oManageImages->path) && !empty($oManageImages->newname)) {
                $sImage = $oManageImages->path . "/$sThumb" . $oManageImages->newname;
            }
        }
        return $sImage;
    }

}

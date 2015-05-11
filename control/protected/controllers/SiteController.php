<?php

class SiteController extends Controller {

    public $layout = 'main';

    public function actionIndex() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("/control/login/");
        } else {
            $this->pageTitle = ": Home";
            //echo "Getting to this point";
            $this->render("dashboard");
        }
    }

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    public function actionDashboard() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("/control/login/");
        } else {
            $this->pageTitle = ": Dashboard";
            //echo "Getting to this point";
            $this->render("dashboard");
        }
    }

    public function actionProfile() {

        if (Yii::app()->user->isGuest) {
            $this->redirect("/control/login/");
        } else {
            $oCompany = CompanyDetails::model()->find('UserID=:UserID', array(':UserID' => Yii::app()->user->id));
            if ($oCompany->id) {
                $oCompanyContacts = CompanyContacts::model()->find('CompanyID=:CompanyID', array(':CompanyID' => $oCompany->id));
            } else {
                Yii::app()->user->logout();
                $this->redirect("/control/");
            }

            if (isset($_POST["CompanyDetails"])) {
                $oCompany->attributes = $_POST["CompanyDetails"];
                if ($oCompany->validate()) {
                    $oCompany->update("CompanyName", "TradingName", "ProductsAndServices");
                    $this->refresh();
                }
            }

            if (isset($_POST["CompanyContacts"])) {
                $oCompanyContacts->attributes = $_POST["CompanyContacts"];
                $oCompanyContacts->CompanyID = $oCompany->id;
                if (!$oCompanyContacts->id) {
                    $oCompanyContacts->DateCreated = date("Y-m-d H:i:s");
                    $oCompanyContacts->DateUpdated = date("Y-m-d H:i:s");
                    $oCompanyContacts->save();
                } else {
                    $oCompanyContacts->DateUpdated = date("Y-m-d H:i:s");
                    $oCompanyContacts->update();
                }
            }

            $this->render("profile", array("oCompany" => $oCompany, 'oContacts' => $oCompanyContacts));
        }
    }

    public function actionProducts() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("/control/login/");
        } else {
            $oCompany = CompanyDetails::model()->find('UserID=:UserID', array(':UserID' => Yii::app()->user->id));
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect("/control/");
    }

}

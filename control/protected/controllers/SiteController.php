<?php

class SiteController extends Controller {

    public $layout = 'main';

    public function actionIndex() {
        $this->render("index");
        if (Yii::app()->user->isGuest) {
            $this->redirect("../login/");
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
        $this->render("dashboard");
    }

    public function actionProfile() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("../login/");
        } else {

            $oCompanyContacts = CompanyContacts::model();
            $oCompany = CompanyDetails::model()->find('UserID=:UserID', array(':UserID' => 1));

            if (isset($_POST['ContactForm'])) {
                $model->attributes = $_POST['ContactForm'];
                if ($model->validate()) {
                    $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                    mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                    Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                    $this->refresh();
                }
            }


            $this->render("profile", array("oCompany" => $oCompany, 'oContacts' => $oCompanyContacts));
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}

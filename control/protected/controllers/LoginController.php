<?php

/**
 * LoginController controls the view if the login page.
 *
 * @author Lebogang Ratsoana <lebogang.ratsoana@yahoo.com>
 */
class LoginController extends CController {

    public $layout = 'login';

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

    public function actionIndex() {
        if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH) {
            throw new CHttpException(500, "Brands login system requires that PHP have Blowfish support for crypt().");
        }

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
            var_dump($model->login());
        }

        $this->render('login', array('model' => $model));
    }

    public function actionForgotpassword() {
        $oForgotPassword = new ForgotPassword();

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($oForgotPassword);
            Yii::app()->end();
        }

        if (isset($_POST['ForgotPassword'])) {
            $oForgotPassword->Email = $_POST['ForgotPassword']['Email'];
            if ($oForgotPassword->validate()) {
                $oUser = User::model()->find('Email=:Email', array(':Email' => $oForgotPassword->Email));
                if ($oUser->id) {
                    $oForgotPassword->UserID = $oUser->id;
                    $oForgotPassword->Active = "Yes";
                    $oForgotPassword->DateCreated = date("Y-m-d H:i:s");
                    $oForgotPassword->DateUpdated = date("Y-m-d H:i:s");
                    $oForgotPassword->save();
                    if ($oForgotPassword->sendActivation()) {
                        Yii::app()->user->setFlash('success', 'An email with a link to reset your password has been sent to you.');
                    } else {
                        Yii::app()->user->setFlash('error', 'Could not send Activation link. Server error occurred. Please notify the admin of it.');
                    }
                } else {
                    Yii::app()->user->setFlash('error', 'The email address you provided does not exist.');
                }
            }
        }

        $this->render('forgot-password', array('model' => $oForgotPassword));
    }

    /**
     * Resets user password
     */
    public function actionResetpassword() {
        $oResetPassword = new ResetPassword();

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($oResetPassword);
            Yii::app()->end();
        }
        $sHashedEmail = urldecode($_GET['token']);
        if ($sHashedEmail !== NULL) {
            $oForgotPass = ForgotPassword::model()->find('PasswordToken=:PasswordToken AND Active=:Active', array(':PasswordToken' => $sHashedEmail, ":Active" => "Yes"));
            if ($oForgotPass->UserID) {
                $oResetPassword = ResetPassword::model()->find('id=:id', array(':id' => $oForgotPass->UserID));
                if (isset($_POST['ResetPassword'])) {
                    $oResetPassword->Password = $_POST['ResetPassword']["Password"];
                    $oResetPassword->ConfirmPassword = $_POST['ResetPassword']["ConfirmPassword"];
                    if ($oResetPassword->validate()) {
                        $oResetPassword->DateUpdated = date("Y-m-d H:i:s");
                        $oResetPassword->update();
                        $oForgotPass->Active = "No";
                        $oForgotPass->update();
                        Yii::app()->user->setFlash('success', 'Password successfully updated.');
                    }
                }
            }
        } else {
            Yii::app()->user->setFlash('error', 'Incorrect or no password reset token. Please click on the correct reset link');
        }
        $this->render('reset-password', array('model' => $oResetPassword));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}

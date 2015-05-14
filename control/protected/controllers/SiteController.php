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
                    $oCompany->dateupdated = date("Y-m-d H:i:s");

                    if ($oCompany->update("CompanyName", "TradingName", "ProductsAndServices")) {
                        Yii::app()->user->setFlash('success', "Profile successfully updated");
                        $this->redirect("/control/site/profile");
                    } else {
                        Yii::app()->user->setFlash('error', "Failed to update profile");
                    }
                }
            }

            if (isset($_POST["CompanyContacts"])) {
                $oCompanyContacts->attributes = $_POST["CompanyContacts"];
                $oCompanyContacts->CompanyID = $oCompany->id;
                if (!$oCompanyContacts->id) {
                    $oCompanyContacts->datecreated = date("Y-m-d H:i:s");
                    $oCompanyContacts->dateupdated = date("Y-m-d H:i:s");
                    if ($oCompanyContacts->save()) {
                        Yii::app()->user->setFlash('success', "Company contacts successfully created");
                    }
                } else {
                    $oCompanyContacts->dateupdated = date("Y-m-d H:i:s");
                    if ($oCompanyContacts->update()) {
                        Yii::app()->user->setFlash('success', "Company contacts successfully updated");
                    }
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
            $oProducts = new Products();
            $aProducts = Products::model()->findAll('CompanyID=:CompanyID', array(":CompanyID" => $oCompany->id));
            $this->render("products", array("oProducts" => $oProducts, "aProducts" => $aProducts));
        }
    }

    public function actionAddproduct() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("/control/login/");
        } else {
            $oCompany = CompanyDetails::model()->find('UserID=:UserID', array(':UserID' => Yii::app()->user->id));
            if (isset($_GET['pid'])) {
                $oProducts = Products::model()->find('id=:id', array(":id" => (int) $_GET['pid']));
            } else {
                $oProducts = new Products();
            }

            if (isset($_POST["Products"])) {
                $oProducts->attributes = $_POST["Products"];

                $oProducts->CompanyID = $oCompany->id;
                $oProducts->Active = 1;
                $oProducts->DateUpdated = date("Y-m-d H:i:s");
                if (isset($oProducts->id) && $oProducts->id > 0) {
                    $oProducts->update();
                    Yii::app()->user->setFlash('success', 'Product successfully updated.');
                } else {
                    $oProducts->DateCreated = date("Y-m-d H:i:s");
                    $oProducts->save();
                    Yii::app()->user->setFlash('success', 'Product successfully created.');
                }
            }
            $this->render("add-product", array("oCompany" => $oCompany, "oProducts" => $oProducts));
        }
    }

    public function actionAddservice() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("/control/login/");
        } else {
            $oCompany = CompanyDetails::model()->find('UserID=:UserID', array(':UserID' => Yii::app()->user->id));
            if (isset($_GET['pid'])) {
                $oServices = Services::model()->find('id=:id', array(":id" => (int) $_GET['pid']));
            } else {
                $oServices = new Services();
            }

            if (isset($_POST["Services"])) {
                $oServices->attributes = $_POST["Services"];

                $oServices->CompanyID = $oCompany->id;
                $oServices->DateUpdated = date("Y-m-d H:i:s");
                if (isset($oServices->id) && $oServices->id > 0) {
                    $oServices->update();
                    Yii::app()->user->setFlash('success', 'Service successfully updated.');
                } else {
                    $oServices->DateCreated = date("Y-m-d H:i:s");
                    $oServices->save();
                    Yii::app()->user->setFlash('success', 'Service successfully created.');
                }
            }
            $this->render("add-service", array("oCompany" => $oCompany, "oServices" => $oServices));
        }
    }

    public function actionServices() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("/control/login/");
        } else {
            $oCompany = CompanyDetails::model()->find('UserID=:UserID', array(':UserID' => Yii::app()->user->id));
            $oServices = new Services();
            $aServices = Services::model()->findAll('CompanyID=:CompanyID', array(":CompanyID" => $oCompany->id));
            $this->render("services", array("oServices" => $oServices, "aServices" => $aServices));
        }
    }

    public function actionAddvacancy() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("/control/login/");
        } else {
            $oCompany = CompanyDetails::model()->find('UserID=:UserID', array(':UserID' => Yii::app()->user->id));
            if (isset($_GET['pid'])) {
                $oVacancies = Vacancies::model()->find('id=:id', array(":id" => (int) $_GET['pid']));
            } else {
                $oVacancies = new Vacancies();
            }

            if (isset($_POST["Vacancies"])) {
                $oVacancies->attributes = $_POST["Vacancies"];
                $oVacancies->StartDate = date("Y-m-d H:i:s", strtotime(str_replace(array('\\', "/"), "-", $oVacancies->StartDate)));

                $oVacancies->CompanyID = $oCompany->id;
                $oVacancies->DateUpdated = date("Y-m-d H:i:s");
                if (isset($_POST["Vacancies"]['id']) && $_POST["Services"]['id'] > 0) {
                    $oVacancies->update();
                    Yii::app()->user->setFlash('success', 'Vacancies successfully updated.');
                } else {
                    $oVacancies->DateCreated = date("Y-m-d H:i:s");
                    $oVacancies->save();
                    Yii::app()->user->setFlash('success', 'Vacancies successfully updated.');
                }
            }
            $this->render("add-vacancy", array("oCompany" => $oCompany, "oVacancies" => $oVacancies));
        }
    }

    public function actionVacancies() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("/control/login/");
        } else {
            $oCompany = CompanyDetails::model()->find('UserID=:UserID', array(':UserID' => Yii::app()->user->id));
            $oVacancies = new Vacancies();
            $aVacancies = Vacancies::model()->findAll('CompanyID=:CompanyID', array(":CompanyID" => $oCompany->id));
            $this->render("vacancies", array("oVacancies" => $oVacancies, "aVacancies" => $aVacancies));
        }
    }

    public function actionPromotions() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("/control/login/");
        } else {
            $oCompany = CompanyDetails::model()->find('UserID=:UserID', array(':UserID' => Yii::app()->user->id));
            $oPromotions = new Promotions();
            $aPromotions = Promotions::model()->findAll('CompanyID=:CompanyID', array(":CompanyID" => $oCompany->id));
            $this->render("promotions", array("oPromotions" => $oPromotions, "aPromotions" => $aPromotions));
        }
    }

    public function actionAddpromotion() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("/control/login/");
        } else {
            $oCompany = CompanyDetails::model()->find('UserID=:UserID', array(':UserID' => Yii::app()->user->id));
            if (isset($_GET['pid'])) {
                $oPromotions = Promotions::model()->find('id=:id', array(":id" => (int) $_GET['pid']));
            } else {
                $oPromotions = new Promotions();
            }

            if (isset($_POST["Promotions"])) {
                $oPromotions->attributes = $_POST["Promotions"];
                $oPromotions->StartDate = date("Y-m-d H:i:s", strtotime(str_replace(array('\\', "/"), "-", $oPromotions->StartDate)));
                $oPromotions->Active = 1;
                $oPromotions->CompanyID = $oCompany->id;
                $oPromotions->DateUpdated = date("Y-m-d H:i:s");
                if (isset($oPromotions->id) && $oPromotions->id > 0) {
                    $oPromotions->update();
                    Yii::app()->user->setFlash('success', 'Promotion successfully updated.');
                } else {
                    $oPromotions->DateCreated = date("Y-m-d H:i:s");
                    $oPromotions->save();
                    Yii::app()->user->setFlash('success', 'Promotion successfully created.');
                }
            }
            $this->render("add-promotion", array("oCompany" => $oCompany, "oPromotions" => $oPromotions));
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

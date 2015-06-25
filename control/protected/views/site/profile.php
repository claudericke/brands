

<div class="row">
    <h2>PROFILE</h2>
</div>

<div class="row">
    <h5>Basic Information</h5>
</div>

<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="successFeedbackMessage">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>

<?php endif; ?>

<?php if (Yii::app()->user->hasFlash('error')): ?>
    <div class="errorFeedbackMessage">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>

<?php endif; ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'company-details-form',
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
);
?>
<div class="row">
    <?php
    if ($oCompany->companylogoid > 0) {
        $aImage = ManageImages::model()->find('id=:id', array(':id' => $oCompany->companylogoid));
        echo "<img src='{$aImage["path"]}/thumbs/{$aImage["newname"]}' alt='" . $oCompany->CompanyName . "'/>";
    }

    echo $form->labelEx($oImageManager, 'image') .
    $form->fileField($oImageManager, 'image', array('class' => 'left u-full-width')) .
    $form->error($oImageManager, 'image', array("class" => "errorFeedbackMessage"));
    ?>
</div>
<div class="row">
    <?php
    echo $form->labelEx($oCompany, 'CompanyName') .
    $form->textField($oCompany, 'CompanyName', array('class' => 'left u-full-width')) .
    $form->error($oCompany, 'CompanyName', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oCompany, 'TradingName') .
    $form->textField($oCompany, 'TradingName', array('class' => 'left u-full-width')) .
    $form->error($oCompany, 'TradingName', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php
    $aIndustryData = CHtml::listData($oCompany->getCategoryOptions(), 'text', 'text', 'group');
    echo $form->labelEx($oCompany, 'Industry') .
    $form->dropDownList($oCompany, "Industry", $aIndustryData, array('class' => 'left u-full-width')) .
    $form->error($oCompany, 'Industry', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oCompany, 'ProductsAndServices') .
    $form->checkboxList($oCompany, 'ProductsAndServices', array('Brands Premium' => 'Brands Premium', 'Brands Scroll Advert' => 'Brands Scroll Advert', 'Brands Promotional Advert ' => 'Brands Promotional Advert', 'Brands Magazine' => 'Brands Magazine', "Post" => "Post"), array('labelOptions' => array('style' => 'display:inline'), 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',)) .
    $form->error($oCompany, 'ProductsAndServices', array("class" => "errorFeedbackMessage"));
    ?>
</div>



<div class="row">
    <?php echo CHtml::submitButton('UPDATE', array('class' => 'login_btn')); ?>
</div>

<h5>Contact Information</h5>

<?php
$this->endWidget();

$oContactInfoForm = $this->beginWidget('CActiveForm', array(
    'id' => 'company-contacts-form',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
);
?>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'Email') .
    $form->textField($oContacts, 'Email', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'Email', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'AlternativeEmail') .
    $form->textField($oContacts, 'AlternativeEmail', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'AlternativeEmail', array("class" => "errorFeedbackMessage"));
    ?>
</div>



<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'CompanyPhone1') .
    $form->textField($oContacts, 'CompanyPhone1', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'CompanyPhone1', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'CompanyPhone2') .
    $form->textField($oContacts, 'CompanyPhone2', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'CompanyPhone2', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'CompanyPhone3') .
    $form->textField($oContacts, 'CompanyPhone3', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'CompanyPhone3', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'PhysicalAddress') .
    $form->textField($oContacts, 'PhysicalAddress', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'PhysicalAddress', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'PostalAddress') .
    $form->textField($oContacts, 'PostalAddress', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'PostalAddress', array("class" => "errorFeedbackMessage"));
    ?>
</div>
<br/>
<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'PreferredLanguage') .
    $form->checkboxList($oContacts, 'PreferredLanguage', array('English' => 'English', 'Shona' => 'Shona', 'Ndebele' => 'Ndebele'), array('labelOptions' => array('style' => 'display:inline'), 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',)) .
    $form->error($oContacts, 'PreferredLanguage', array("class" => "errorFeedbackMessage"));
    ?>
</div>
<br/>
<div class="row">

    <?php
    echo $form->labelEx($oContacts, 'PreferredCorrespondence');
    echo $form->radioButtonList($oContacts, 'PreferredCorrespondence', array('MobilePhone' => 'Mobile Phone', 'Email' => 'Email', 'Post' => 'Post'), array('labelOptions' => array('style' => 'display:inline'), 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',));
    echo $form->error($oContacts, 'PreferredCorrespondence', array("class" => "errorFeedbackMessage"));
    ?>
</div>
<br/>

<div class="row">
    <?php echo CHtml::submitButton('UPDATE', array('class' => 'login_btn')); ?>
</div>

<?php
$this->endWidget();
?>

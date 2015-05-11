

<div class="row">
    <h2>PROFILE</h2>
</div>

<div class="row">
    <h5>Basic Information</h5>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'products',
    'enableAjaxValidation' => true,
        )
);
?>

<div class="row">
    <?php
    echo $form->labelEx($oCompany, 'CompanyName') .
    $form->textField($oCompany, 'CompanyName', array('class' => 'left u-full-width')) .
    $form->error($oCompany, 'CompanyName');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oCompany, 'TradingName') .
    $form->textField($oCompany, 'TradingName', array('class' => 'left u-full-width')) .
    $form->error($oCompany, 'TradingName');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oCompany, 'ProductsAndServices') .
    $form->textField($oCompany, 'ProductsAndServices', array('class' => 'left u-full-width')) .
    $form->error($oCompany, 'ProductsAndServices');
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
    'enableAjaxValidation' => true,
        )
);
?>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'Email') .
    $form->textField($oContacts, 'Email', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'Email');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'CompanyPhone1') .
    $form->textField($oContacts, 'CompanyPhone1', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'CompanyPhone1');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'CompanyPhone2') .
    $form->textField($oContacts, 'CompanyPhone2', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'CompanyPhone2');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'CompanyPhone3') .
    $form->textField($oContacts, 'CompanyPhone3', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'CompanyPhone3');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'PhysicalAddress') .
    $form->textField($oContacts, 'PhysicalAddress', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'PhysicalAddress');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'PostalAddress') .
    $form->textField($oContacts, 'PostalAddress', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'PostalAddress');
    ?>
</div>
<br/>
<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'PreferredLanguage') .
    $form->checkboxList($oContacts, 'PreferredLanguage', array('English' => 'English', 'Shona' => 'Shona', 'Ndebele' => 'Ndebele'), array('labelOptions' => array('style' => 'display:inline'), 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',)) .
    $form->error($oContacts, 'PreferredLanguage');
    ?>
</div>
<br/>
<div class="row">

    <?php
    echo $form->labelEx($oContacts, 'PreferredCorrespondence');
    echo $form->radioButtonList($oContacts, 'PreferredCorrespondence', array('MobilePhone' => 'Mobile Phone', 'eMail' => 'eMail', 'Post' => 'Post'), array('labelOptions' => array('style' => 'display:inline'), 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',));
    echo $form->error($oContacts, 'PreferredCorrespondence');
    ?>
</div>
<br/>

<div class="row">
    <?php echo CHtml::submitButton('UPDATE', array('class' => 'login_btn')); ?>
</div>

<?php
$this->endWidget();
?>
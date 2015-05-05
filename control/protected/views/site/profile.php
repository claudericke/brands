

<div class="row">
    <h2>PROFILE</h2>
</div>

<h3>Basic Information</h3>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
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


<h3>Contact Information</h3>
<?php
$this->endWidget();

$oContactInfoForm = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableAjaxValidation' => true,
        )
);
?>

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

<div class="row">
    <?php
    echo $form->labelEx($oContacts, 'PreferredLanguage') .
    $form->textField($oContacts, 'PostalAddress', array('class' => 'left u-full-width')) .
    $form->error($oContacts, 'PostalAddress');
    ?>
</div>

<?php
echo "<pre>" . $oCompany->ID;
print_r($oContacts);

$this->endWidget();
?>
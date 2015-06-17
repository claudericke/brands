

<div class="row">
    <h2>SETTINGS</h2>
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
    echo $form->labelEx($oUser, 'FirstName') .
    $form->textField($oUser, 'FirstName', array('class' => 'left u-full-width')) .
    $form->error($oUser, 'FirstName', array("class" => "errorFeedbackMessage"));
    ?>
</div>
<div class="row">
    <?php
    echo $form->labelEx($oUser, 'LastName') .
    $form->textField($oUser, 'LastName', array('class' => 'left u-full-width')) .
    $form->error($oUser, 'LastName', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oUser, 'Email') .
    $form->textField($oUser, 'Email', array('class' => 'left u-full-width')) .
    $form->error($oUser, 'Email', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oUser, 'Password') .
    $form->passwordField($oUser, 'Password', array('class' => 'left u-full-width')) .
    $form->error($oUser, 'Password', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php echo CHtml::submitButton('UPDATE', array('class' => 'login_btn')); ?>
</div>
<?php
$this->endWidget();

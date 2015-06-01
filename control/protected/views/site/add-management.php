

<div class="row">
    <h2>Add to Management</h2>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'management',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
);
?>

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

<div class="row">
    <?php
    echo
    $form->error($oManagement, 'Title', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oManagement, 'Title') .
    $form->dropDownList($oManagement, 'Title', array(
        "Mr" => "Mr",
        "Ms" => "Ms",
        "Mrs" => "Mrs",
        "Miss" => "Miss",
        "Sir" => "Sir",
        "Doctor" => "Doctor",
        "Professor" => "Professor",
        "Reverend" => "Reverend",
        "Lady" => "Lady",
        "Captain" => "Captain",
        "Master" => "Master",
        "Major" => "Major",
        "Lord" => "Lord",
        "General" => "General",
        "Colonel" => "Colonel",
        "Other" => "Other",
            ), array('class' => 'left u-full-width'));
    ?>
</div>


<div class="row">
    <?php
    echo $form->error($oManagement, 'Name', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oManagement, 'Name') .
    $form->textField($oManagement, 'Name', array('class' => 'left u-full-width'));
    ?>
</div>
<div class="row">
    <?php
    echo $form->error($oManagement, 'Surname', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oManagement, 'Surname') .
    $form->textField($oManagement, 'Surname', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oManagement, 'Position', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oManagement, 'Position') .
    $form->textField($oManagement, 'Position', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oManagement, 'Email', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oManagement, 'Email') .
    $form->textField($oManagement, 'Email', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oManagement, 'ContactNumber', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oManagement, 'ContactNumber') .
    $form->textField($oManagement, 'ContactNumber', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oManagement, 'WebAddress', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oManagement, 'WebAddress') .
    $form->textField($oManagement, 'WebAddress', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oManagement, 'Description', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oManagement, 'Description') .
    $form->textArea($oManagement, 'Description', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    if ($oManagement->ManagementImageId > 0) {
        $aImage = ManageImages::model()->find('id=:id', array(':id' => $oManagement->ManagementImageId));
        echo "<img src='{$aImage["path"]}/thumbs/{$aImage["newname"]}' alt='" . $oManagement->Name . "'/>";
    }

    echo $form->labelEx($oImageManager, 'image') .
    $form->fileField($oImageManager, 'image', array('class' => 'left u-full-width')) .
    $form->error($oImageManager, 'image', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php echo CHtml::submitButton('CREATE', array('class' => 'login_btn')); ?>
</div>


<?php
$this->endWidget();
?>
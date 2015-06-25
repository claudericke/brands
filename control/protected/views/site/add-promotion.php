

<div class="row">
    <h2>Add Promotion</h2>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'promotions',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
);

Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
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
    echo $form->error($oPromotions, 'Title', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oPromotions, 'Title') .
    $form->textField($oPromotions, 'Title', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oPromotions, 'Description', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oPromotions, 'Description') .
    $form->textArea($oPromotions, 'Description', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    if ($oPromotions->PromotionImageId > 0) {
        $aImage = ManageImages::model()->find('id=:id', array(':id' => $oPromotions->PromotionImageId));
        echo "<img src='{$aImage["path"]}/thumbs/{$aImage["newname"]}' alt='" . $oPromotions->Title . "'/>";
    }

    echo $form->labelEx($oImageManager, 'image') .
    $form->fileField($oImageManager, 'image', array('class' => 'left u-full-width')) .
    $form->error($oImageManager, 'image', array("class" => "errorFeedbackMessage"));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oPromotions, 'StartDate', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oPromotions, 'StartDate');

    $this->widget('CJuiDateTimePicker', array(
        'model' => $oPromotions,
        'attribute' => 'StartDate', //
        'mode' => 'datetime', //
        'value' => Yii::app()->dateFormatter->format("yyyy-MM-dd", strtotime($oPromotions->StartDate)),
        'options' => array(
            'timeFormat' => strtolower(Yii::app()->locale->timeFormat),
            'showSecond' => true,
            'dateFormat' => 'yy-mm-dd',
        ),
        'htmlOptions' => array(
            'class' => 'left u-full-width'
        ),
        'language' => ''
    ));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oPromotions, 'EndDate', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oPromotions, 'EndDate');

    $this->widget('CJuiDateTimePicker', array(
        'model' => $oPromotions,
        'attribute' => 'EndDate', //
        'mode' => 'datetime', //
        'value' => Yii::app()->dateFormatter->format("yyyy-MM-dd", strtotime($oPromotions->EndDate)),
        'options' => array(
            'timeFormat' => strtolower(Yii::app()->locale->timeFormat),
            'showSecond' => true,
            'dateFormat' => 'yy-mm-dd',
        ),
        'htmlOptions' => array(
            'class' => 'left u-full-width'
        ),
        'language' => ''
    ));
    ?>
</div>

<div class="row">
    <?php echo CHtml::submitButton('CREATE', array('class' => 'login_btn')); ?>
</div>


<?php
$this->endWidget();
?>

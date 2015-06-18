

<div class="row">
    <h2>Add Vacancy</h2>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'vacancies',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
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
    echo $form->error($oEvents, 'Title', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oEvents, 'Title') .
    $form->textField($oEvents, 'Title', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo
    $form->error($oEvents, 'EventType', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oEvents, 'EventType') .
    $form->dropDownList($oEvents, 'EventType', array(
        'Conference' => 'Conference',
        'Seminar' => 'Seminar',
        'Meeting' => 'Meeting',
        'Celebration' => 'Celebration',
        'Ceremonies' => 'Ceremonies',
        'Team Building' => 'Team Building',
        'Party' => 'Party',
        'Music' => 'Music',
        'Marketing' => 'Marketing',
            ), array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oEvents, 'Location', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oEvents, 'Location') .
    $form->textField($oEvents, 'Location', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oEvents, 'Description', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oEvents, 'Description') .
    $form->textArea($oEvents, 'Description', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oEvents, 'StartDate', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oEvents, 'StartDate');


    $this->widget('CJuiDateTimePicker', array(
        'model' => $oEvents,
        'attribute' => 'StartDate', //
        'mode' => 'datetime', //
        'value' => Yii::app()->dateFormatter->format("yyyy-MM-dd", strtotime($oEvents->StartDate)),
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
    echo $form->error($oEvents, 'EndDate', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oEvents, 'EndDate');
    $this->widget('CJuiDateTimePicker', array(
        'model' => $oEvents,
        'attribute' => 'EndDate', //
        'mode' => 'datetime', //
        'value' => Yii::app()->dateFormatter->format("yyyy-MM-dd", strtotime($oEvents->EndDate)),
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
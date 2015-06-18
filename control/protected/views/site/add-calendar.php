

<div class="row">
    <h2>Add to Calendar</h2>
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
    echo $form->error($oCalendar, 'Title', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oCalendar, 'Title') .
    $form->textField($oCalendar, 'Title', array('class' => 'left u-full-width'));
    ?>
</div>


<div class="row">
    <?php
    echo $form->error($oCalendar, 'Description', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oCalendar, 'Description') .
    $form->textArea($oCalendar, 'Description', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oCalendar, 'StartDate', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oCalendar, 'StartDate');


    $this->widget('CJuiDateTimePicker', array(
        'model' => $oCalendar,
        'attribute' => 'StartDate', //
        'mode' => 'datetime', //
        'value' => Yii::app()->dateFormatter->format("yyyy-MM-dd", strtotime($oCalendar->StartDate)),
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
    echo $form->error($oCalendar, 'EndDate', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oCalendar, 'EndDate');
    $this->widget('CJuiDateTimePicker', array(
        'model' => $oCalendar,
        'attribute' => 'EndDate', //
        'mode' => 'datetime', //
        'value' => Yii::app()->dateFormatter->format("yyyy-MM-dd", strtotime($oCalendar->EndDate)),
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
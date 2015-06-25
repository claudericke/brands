

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
    echo $form->error($oVacancies, 'Title', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oVacancies, 'Title') .
    $form->textField($oVacancies, 'Title', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo
    $form->error($oVacancies, 'VacancyType', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oVacancies, 'VacancyType') .
    $form->dropDownList($oVacancies, 'VacancyType', array(
        'Permanent' => 'Permanent',
        'contract' => 'contract',
        'Internship' => 'Internship',
        'Learnership' => 'Learnership',
            ), array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo
    $form->error($oVacancies, 'YearsOfExperience', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oVacancies, 'YearsOfExperience') .
    $form->dropDownList($oVacancies, 'YearsOfExperience', array(
        '0' => '0',
        '1' => '1',
        '3' => '3',
        '5' => '5',
        '10' => '10',
            ), array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oVacancies, 'Location', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oVacancies, 'Location') .
    $form->textField($oVacancies, 'Location', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oVacancies, 'Description', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oVacancies, 'Description') .
    $form->textArea($oVacancies, 'Description', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oVacancies, 'StartDate', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oVacancies, 'StartDate');

    $this->widget('CJuiDateTimePicker', array(
        'model' => $oVacancies,
        'attribute' => 'StartDate', //
        'mode' => 'datetime', //
        'value' => Yii::app()->dateFormatter->format("yyyy-MM-dd", strtotime($oVacancies->StartDate)),
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

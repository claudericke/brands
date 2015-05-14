

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
?>

<div class="row">
    <?php
    echo $form->error($oVacancies, 'Title') .
    $form->labelEx($oVacancies, 'Title') .
    $form->textField($oVacancies, 'Title', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oVacancies, 'Description') .
    $form->labelEx($oVacancies, 'Description') .
    $form->textArea($oVacancies, 'Description', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oVacancies, 'StartDate') .
    $form->labelEx($oVacancies, 'StartDate');

    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'Vacancies[StartDate]',
        'id' => 'Vacancies_StartDate',
        'value' => Yii::app()->dateFormatter->format("yyyy-MM-dd", strtotime($oVacancies->StartDate)),
        'options' => array(
            'showAnim' => 'fold',
            'dateFormat' => 'yy-mm-dd',
        ),
        'htmlOptions' => array(
            'class' => 'left u-full-width'
        ),
    ));
    ?>
</div>

<div class="row">
    <?php echo CHtml::submitButton('CREATE', array('class' => 'login_btn')); ?>
</div>


<?php
$this->endWidget();
?>
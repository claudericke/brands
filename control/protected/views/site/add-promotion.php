

<div class="row">
    <h2>Add Promotion</h2>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'promotions',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
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
    echo $form->error($oPromotions, 'Title') .
    $form->labelEx($oPromotions, 'Title') .
    $form->textField($oPromotions, 'Title', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oPromotions, 'Description') .
    $form->labelEx($oPromotions, 'Description') .
    $form->textArea($oPromotions, 'Description', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oPromotions, 'StartDate') .
    $form->labelEx($oPromotions, 'StartDate');

    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'Promotions[StartDate]',
        'id' => 'Promotions',
        'value' => Yii::app()->dateFormatter->format("yyyy-MM-dd", strtotime($oPromotions->StartDate)),
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
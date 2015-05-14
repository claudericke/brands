

<div class="row">
    <h2>Add Service</h2>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'services',
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
    echo $form->error($oServices, 'Service', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oServices, 'Service') .
    $form->textField($oServices, 'Service', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oServices, 'Description', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oServices, 'Description') .
    $form->textArea($oServices, 'Description', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php echo CHtml::submitButton('CREATE', array('class' => 'login_btn')); ?>
</div>


<?php
$this->endWidget();
?>
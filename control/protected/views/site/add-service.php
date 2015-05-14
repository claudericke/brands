

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

<div class="row">
    <?php
    echo $form->error($oServices, 'Service') .
    $form->labelEx($oServices, 'Service') .
    $form->textField($oServices, 'Service', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oServices, 'Description') .
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
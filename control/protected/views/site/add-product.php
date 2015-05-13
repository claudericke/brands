

<div class="row">
    <h2>Add Product</h2>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'products',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
);
?>
<div class="row">
    <?php
    echo
    $form->error($oProducts, 'Category') .
    $form->labelEx($oProducts, 'Category') .
    $form->dropDownList($oProducts, 'Category', array("Electronics" => "Electronics", "Household" => "Household"), array('class' => 'left u-full-width'));
    ?>
</div>


<div class="row">
    <?php
    echo $form->error($oProducts, 'ProductName') .
    $form->labelEx($oProducts, 'ProductName') .
    $form->textField($oProducts, 'ProductName', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oProducts, 'Description') .
    $form->labelEx($oProducts, 'Description') .
    $form->textArea($oProducts, 'Description', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oProducts, 'Quantity') .
    $form->labelEx($oProducts, 'Quantity', array('class' => 'left u-full-width')) .
    $form->textField($oProducts, 'Quantity', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oProducts, 'Price') .
    $form->labelEx($oProducts, 'Price') .
    $form->textField($oProducts, 'Price', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php echo CHtml::submitButton('CREATE', array('class' => 'login_btn')); ?>
</div>


<?php
$this->endWidget();
?>
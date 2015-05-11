

<div class="row">
    <h2>Products</h2>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'products',
    'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
        )
);
?>
<?php
/** Start Widget * */
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'mydialog',
    'options' => array(
        'title' => 'Dialog box',
        'autoOpen' => false,
    ),
));
?>
<div class="row">
    <?php
    echo
    $form->error($oProducts, 'CategoryID') .
    $form->labelEx($oProducts, 'CategoryID') .
    $form->dropDownList($oProducts, 'CategoryID', array(3 => "Electronics", 3 => "Household"), array('class' => 'left u-full-width'));
    ?>
</div>


<div class="row">
    <?php
    echo $form->labelEx($oProducts, 'ProductName') .
    $form->textField($oProducts, 'ProductName', array('class' => 'left u-full-width')) .
    $form->error($oProducts, 'ProductName');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($oProducts, 'Description') .
    $form->textArea($oProducts, 'Description', array('class' => 'left u-full-width')) .
    $form->error($oProducts, 'Description');
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
    echo $form->labelEx($oProducts, 'Price') .
    $form->textField($oProducts, 'Price', array('class' => 'left u-full-width')) .
    $form->error($oProducts, 'Price');
    ?>
</div>

<div class="row">
    <?php echo CHtml::submitButton('UPDATE', array('class' => 'login_btn')); ?>
</div>


<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
/** End Widget * */
echo CHtml::link('Create product', '#', array(
    'onclick' => '$("#mydialog").dialog("open"); return false;',
));
?>



<?php
$this->endWidget();
?>

Showing a list of products here;

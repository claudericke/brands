

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
    echo
    $form->error($oProducts, 'Category', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oProducts, 'Category') .
    $form->dropDownList($oProducts, 'Category', array(
        "Animals & Pet Supplies" => "Animals & Pet Supplies",
        "Apparel & Accessories" => "Apparel & Accessories",
        "Arts & Entertainment" => "Arts & Entertainment",
        "Baby & Toddler" => "Baby & Toddler",
        "Business & Industrial" => "Business & Industrial",
        "Cameras & Optics" => "Cameras & Optics",
        "Electronics" => "Electronics",
        "Food, Beverages & Tobacco" => "Food, Beverages & Tobacco",
        "Furniture" => "Furniture",
        "Hardware" => "Hardware",
        "Health & Beauty" => "Health & Beauty",
        "Home & Garden" => "Home & Garden",
        "Adult/Erotic" => "Adult/Erotic",
        "Weapons" => "Weapons",
        "Media" => "Media",
        "Office Supplies" => "Office Supplies",
        "Religious & Ceremonial" => "Religious & Ceremonial",
        "Software" => "Software",
        "Sporting Goods" => "Sporting Goods",
        "Toys & Games" => "Toys & Games",
        "Vehicles & Parts" => "Vehicles & Parts",
            ), array('class' => 'left u-full-width'));
    ?>
</div>


<div class="row">
    <?php
    echo $form->error($oProducts, 'ProductName', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oProducts, 'ProductName') .
    $form->textField($oProducts, 'ProductName', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oProducts, 'Description', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oProducts, 'Description') .
    $form->textArea($oProducts, 'Description', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oProducts, 'Quantity', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($oProducts, 'Quantity', array('class' => 'left u-full-width')) .
    $form->textField($oProducts, 'Quantity', array('class' => 'left u-full-width'));
    ?>
</div>

<div class="row">
    <?php
    echo $form->error($oProducts, 'Price', array("class" => "errorFeedbackMessage")) .
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
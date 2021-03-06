<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
        ));
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

    <?php
else :

    echo $form->error($model, 'Password', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($model, 'Password') .
    $form->passwordField($model, 'Password', array('class' => 'left u-full-width'));


    echo $form->error($model, 'ConfirmPassword', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($model, 'ConfirmPassword') .
    $form->passwordField($model, 'ConfirmPassword', array('class' => 'left u-full-width'));
    ?>


    <div class="six columns">
        <a href="/control/login/forgotpassword">Forgot Password?</a><br/>
        <a href="/control/login/">Login</a>
        <p class="left"><a href="/helpdesk">Trouble Logging In?</a></p>
    </div>

    <div class="five columns">
        <?php echo CHtml::submitButton('RESET PASSWORD', array('class' => 'login_btn')); ?>
        <a href="/register"><input type="button" class="register_btn" value="Register" /></a>
    </div>

<?php
endif;
?>
<?php $this->endWidget(); ?>

<br style="clear: both;"/>
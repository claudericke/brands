<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
        ));
?>
<h4>Forgot Username</h4>
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

    echo"<p>Please provide alternative email</p>" . $form->error($model, 'Email', array("class" => "errorFeedbackMessage")) .
    $form->labelEx($model, 'Email') .
    $form->textField($model, 'Email', array('class' => 'left u-full-width'));
    ?>


    <div class="six columns">
        <a href="/control/login/forgotpassword">Forgot Password?</a><br/>
        <a href="/control/login/">Login</a>
        <p class="left"><a href="#">Trouble Logging In?</a></p>
    </div>

    <div class="five columns">
        <?php echo CHtml::submitButton('GET USERNAME', array('class' => 'login_btn')); ?>
        <a href="/register"><input type="button" class="register_btn" value="Register" /></a>
    </div>

<?php
endif;
?>
<?php $this->endWidget(); ?>

<br style="clear: both;"/>

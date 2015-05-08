<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
        ));

echo $form->labelEx($model, 'username') .
 $form->textField($model, 'username', array('class' => 'left u-full-width')) .
 $form->error($model, 'username');


echo $form->labelEx($model, 'password') .
 $form->passwordField($model, 'password', array('class' => 'left u-full-width')) .
 $form->error($model, 'password');
?>

<div class="six columns">
    <a href="#">Forgot Password?</a><br/>
    <a href="#">Forgot Username?</a>
    <p class="left"><a href="helpdesk.html">Trouble Logging In?</a></p>
</div>

<div class="five columns">
    <?php echo CHtml::submitButton('LOGIN', array('class' => 'login_btn')); ?>
    <a href="../register.html"><input type="button" class="register_btn" value="Register" /></a>
</div>

<?php $this->endWidget(); ?>
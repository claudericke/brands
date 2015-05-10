<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
        ));
?>

<?php
echo $form->error($model, 'activated');
echo $form->error($model, 'unknown');

echo $form->error($model, 'username') .
 $form->labelEx($model, 'username') .
 $form->textField($model, 'username', array('class' => 'left u-full-width'));



echo $form->error($model, 'password') .
 $form->labelEx($model, 'password') .
 $form->passwordField($model, 'password', array('class' => 'left u-full-width'));
?>

<div class="six columns">
    <a href="#">Forgot Password?</a><br/>
    <a href="#">Forgot Username?</a>
    <p class="left"><a href="/helpdesk">Trouble Logging In?</a></p>
</div>

<div class="five columns">
    <?php echo CHtml::submitButton('LOGIN', array('class' => 'login_btn')); ?>
    <a href="/register"><input type="button" class="register_btn" value="Register" /></a>
</div>

<?php $this->endWidget(); ?>

<br style="clear: both;"/>
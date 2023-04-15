<?php
/** @var $model \app\models\User */
?>
    <h1>Login</h1>

<?php $form = \rkay\rkaymvc\form\Form::begin("", "POST") ?>

<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php \rkay\rkaymvc\form\Form::end() ?>
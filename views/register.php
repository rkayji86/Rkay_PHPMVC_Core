<?php
/** @var $model \app\models\User */
?>
    <h1>Create an Account</h1>

<?php $form = \rkay\rkaymvc\form\Form::begin("", "POST") ?>

    <div class="row">
        <div class="col"><?= $form->field($model, 'firstname') ?></div>
        <div class="col"><?= $form->field($model, 'lastname') ?></div>
    </div>

<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordField() ?>
<?= $form->field($model, 'confirmPassword')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php \rkay\rkaymvc\form\Form::end() ?>
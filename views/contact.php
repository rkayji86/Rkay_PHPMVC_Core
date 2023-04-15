<?php
/** @var $this \rkay\rkaymvc\View */
/** @var $model \app\models\ContactForm */
$this->title = 'Contact';

use rkay\rkaymvc\form\Form;
use rkay\rkaymvc\form\TextareaField;

?>
<h1>Contact us</h1>

<?php $form = Form::begin('', 'POST') ?>
<?= $form->field($model, 'subject') ?>
<?= $form->field($model, 'email') ?>
<?= new TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>

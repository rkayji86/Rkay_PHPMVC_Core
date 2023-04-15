<?php
/** @var $this \app\core\View */
/** @var $model \app\models\ContactForm */
$this->title = 'Contact';

use app\core\form\Form;
use app\core\form\TextareaField;

?>
<h1>Contact us</h1>

<?php $form = Form::begin('', 'POST') ?>
<?= $form->field($model, 'subject') ?>
<?= $form->field($model, 'email') ?>
<?= new TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>

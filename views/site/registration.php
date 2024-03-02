<?php /** @var $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>


<?php $form = ActiveForm::begin(); ?>

<?= $form -> field($model, 'email') -> textInput() ?>
<?= $form -> field($model, 'password') -> passwordInput() ?>
<?= $form -> field($model, 'passwordRepeat') -> passwordInput() ?>
<?= $form -> field($model, 'last_name') -> textInput() ?>
<?= $form -> field($model, 'first_name') -> textInput() ?>
<?= $form -> field($model, 'patronimic') -> textInput() ?>



<?= Html::submitButton('Зарегистрироваться') ?>


<?php ActiveForm::end(); ?>


<?php /** @var $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<section class="account-area">
    <h2 class="title text-center" style="font-weight: 900">Registration</h2>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="login-form-content">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',

                    ]); ?>
                    <div class="row">
                        <div class="col-12">
                            <?= $form -> field($model, 'email') -> textInput()->label('почта') ?>
                        </div>
                        <div class="col-12">
                            <?= $form -> field($model, 'password') -> passwordInput()->label('пароль') ?>
                        </div>
                        <div class="col-12">
                            <?= $form -> field($model, 'passwordRepeat') -> passwordInput()->label('повторение пароля') ?>
                        </div>
                        <div class="col-12">
                            <?= $form -> field($model, 'last_name') -> textInput()->label('Фамилия') ?>
                        </div>
                        <div class="col-12">
                            <?= $form -> field($model, 'first_name') -> textInput()->label('Имя') ?>
                        </div>
                        <div class="col-12">
                            <?= $form -> field($model, 'patronimic') -> textInput()->label('Отчество') ?>
                        </div>
                        <div class="col-12">

                            <div class="form-group">
                                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn-login', 'name' => 'login-button']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    </div>
</section>

<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';

?>
<section class="account-area">
    <h2 class="title text-center" style="font-weight: 900">Login</h2>
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
                            <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('почта') ?>

                        </div>
                        <div class="col-12">
                            <?= $form->field($model, 'password')->passwordInput() ->label('пароль')?>

                        </div>
                        <div class="col-12">

                            <div class="form-group">

                                <?= Html::submitButton('Войти', ['class' => 'btn-login', 'name' => 'login-button']) ?>

                            </div>
                        </div>
                        <div class="col-12">
                            <?= $form->field($model, 'rememberMe')->checkbox([
                                'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            ])->label('Запомнить') ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    </div>
</section>
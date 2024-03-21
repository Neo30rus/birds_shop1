<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';

?>
<div class="page-header-area" data-bg-img="assets/img/photos/bg1.webp">
    <div class="container pt--0 pb--0">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <h2 class="title">Login</h2>
                    <nav class="breadcrumb-area">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="breadcrumb-sep">//</li>
                            <li>Login</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="account-area">
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
                                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                            </div>
                            <div class="col-12">
                                <?= $form->field($model, 'password')->passwordInput() ?>

                            </div>
                            <div class="col-12">

                                <div class="form-group">

                                        <?= Html::submitButton('Login', ['class' => 'btn-login', 'name' => 'login-button']) ?>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group account-info-group mb--0">
                                    <div class="rememberme-account">
                                        <?= $form->field($model, 'rememberMe')->checkbox([
                                            'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                        ]) ?>
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
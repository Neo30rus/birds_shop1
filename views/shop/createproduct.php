<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductForm $model */
/** @var ActiveForm $form */
?>
<div class="shop-createproduct">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'type_id')->dropDownList($types) ?>
        <?= $form->field($model, 'price') ?>
        <?= $form->field($model, 'description') ?>
    <?= $form->field($model, 'image')->fileInput([
        'value'=> \yii\web\UploadedFile::getInstance($model,'image')
    ]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- shop-createproduct -->

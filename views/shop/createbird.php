<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductForm $model */
/** @var ActiveForm $form */
/** @var  $types */
/** @var  $colors */
/** @var  $families */
?>
<div class="shop-createproduct">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'type_id')->dropDownList($types) ?>
        <?= $form->field($model, 'color_id')->dropDownList($colors) ?>
        <?= $form->field($model, 'family_id')->dropDownList($families) ?>
        <?= $form->field($model, 'price') ?>
        <?= $form->field($model, 'description') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- shop-createproduct -->

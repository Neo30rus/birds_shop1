<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\DirProductType $model */

$this->title = 'Create Dir Product Type';
$this->params['breadcrumbs'][] = ['label' => 'Dir Product Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dir-product-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

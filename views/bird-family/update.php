<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\DirFamilyBird $model */

$this->title = 'Update Dir Family Bird: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dir Family Birds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dir-family-bird-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

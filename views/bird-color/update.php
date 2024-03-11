<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\DirColorBird $model */

$this->title = 'Update Dir Color Bird: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dir Color Birds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dir-color-bird-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

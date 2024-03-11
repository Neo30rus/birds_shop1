<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\DirColorBird $model */

$this->title = 'Create Dir Color Bird';
$this->params['breadcrumbs'][] = ['label' => 'Dir Color Birds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dir-color-bird-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\DirFamilyBird $model */

$this->title = 'Create Dir Family Bird';
$this->params['breadcrumbs'][] = ['label' => 'Dir Family Birds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dir-family-bird-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

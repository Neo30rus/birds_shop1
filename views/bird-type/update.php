<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\DirBirdType $model */

$this->title = 'Update Dir Bird Type: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dir Bird Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dir-bird-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

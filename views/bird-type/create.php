<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\entity\DirBirdType $model */

$this->title = 'Create Dir Bird Type';
$this->params['breadcrumbs'][] = ['label' => 'Dir Bird Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dir-bird-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

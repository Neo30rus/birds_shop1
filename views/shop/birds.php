<?php
/** @var $birds */
?>
<?php if (Yii::$app->user->can('admin')): ?>
<a href="/shop/create-bird">Добавить новую птицу</a>
<?php endif;?>
<div>
    <?php foreach ($birds as $bird): ?>
    <h1><?=$bird->title?></h1>

        <img src="/shop/image?dir=birds&id=<?=$bird->id?>" alt="">

    <h4><?=$bird->description?></h4>
    <p><?=$bird->type->title?></p>
    <p><?=$bird->color->title?></p>
    <p><?=$bird->family->title?></p>
    <p><?=$bird->price?></p>
    <a href="/shop/add-to-cart?bird_id=<?=$bird->id?>">в корзину</a>
    <?php endforeach; ?>
</div>
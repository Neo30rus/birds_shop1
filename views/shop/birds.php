<?php
/** @var $birds */
?>

<div>
    <?php foreach ($birds as $bird): ?>
    <h1><?=$bird->title?></h1>
    <h4><?=$bird->description?></h4>
    <p><?=$bird->type->title?></p>
    <p><?=$bird->color->title?></p>
    <p><?=$bird->family->title?></p>
    <p><?=$bird->price?></p>
    <a href="/shop/add-to-cart?bird_id=<?=$bird->id?>">в корзину</a>
    <?php endforeach; ?>
</div>
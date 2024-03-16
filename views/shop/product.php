<?php
/** @var $products */
?>
<?php if (Yii::$app->user->can('admin')): ?>
<a href="/shop/create-product">создать новый продукт</a>
<?php endif;?>
<div>
    <?php foreach ($products as $product): ?>
    <h1><?=$product->title?></h1>
        <img src="/shop/image?dir=products&id=<?=$product->id?>" alt="">
    <h4><?=$product->description?></h4>
    <p><?=$product->type->title?></p>
    <p><?=$product->price?></p>
        <a href="/shop/add-to-cart?product_id=<?=$product->id?>">в корзину</a>
    <?php endforeach; ?>
</div>
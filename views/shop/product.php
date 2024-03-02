<?php
/** @var $products */
?>

<div>
    <?php foreach ($products as $product): ?>
    <h1><?=$product->title?></h1>
    <h4><?=$product->description?></h4>
    <p><?=$product->type->title?></p>
    <p><?=$product->price?></p>
    <?php endforeach; ?>
</div>
<?php

?>

<div>
    <h1>птицы</h1>
    <div>
        <?php foreach ($cart->birds as $bird):?>
        <h3><?=$bird->title?></h3>
        <h3><?=$bird->price?></h3>
        <?php endforeach; ?>
    </div>
</div>
<div>
    <h1>товары</h1>
    <div>
        <?php foreach ($cart->products as $product):?>
        <h3><?=$product->title?></h3>
        <h3><?=$product->price?></h3>
        <?php endforeach; ?>
    </div>
</div>
<a href="/shop/buy-cart">Покупка</a>
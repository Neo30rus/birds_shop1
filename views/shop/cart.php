<?php

?>

<a href="/shop/buy-cart">Покупка</a>
<section class="shopping-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart-form table-responsive">
                    <form action="#" method="post">
                        <table class="table text-center">
                            <thead>
                            <tr>

                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Птицы</th>
                                <th class="product-price">Цена</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($cart->birds as $bird):?>
                            <tr class="tbody-item">
                                <td class="product-thumbnail">
                                    <div class="thumb">
                                        <a href="single-product.html">
                                            <img src="assets/img/shop/product-mini/cart1.webp" width="75" height="75" alt="Image-HasTech">
                                        </a>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a class="title" href="single-product.html"><?=$bird->title?></a>
                                </td>
                                <td class="product-price">
                                    <span class="price"><?=$bird->price?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Товар</th>
                                <th class="product-price">Цена</th>
                            </tr>
                            <?php foreach ($cart->products as $product):?>
                                <tr class="tbody-item">
                                    <td class="product-thumbnail">
                                        <div class="thumb">
                                            <a href="single-product.html">
                                                <img src="assets/img/shop/product-mini/cart1.webp" width="75" height="75" alt="Image-HasTech">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a class="title" href="single-product.html"><?=$product->title?></a>
                                    </td>
                                    <td class="product-price">
                                        <span class="price"><?=$product->price?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="tbody-item-actions">
                                <td colspan="3">
                                    <a href="/shop/buy-cart">
                                    <button type="button" class="btn-update-cart " >Купить</button></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
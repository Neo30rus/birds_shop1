<?php

?>

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
                                        <a href="/shop/image?dir=birds&id=<?=$bird->id?>">
                                            <img src="/shop/image?dir=birds&id=<?=$bird->id?>" width="75" height="75" alt="Image-HasTech">
                                        </a>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a class="title" href="/shop/bird?id=<?=$bird->id?>"><?=$bird->title?></a>
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
                                            <a href="/shop/image?dir=products&id=<?=$product->id?>">
                                                <img src="/shop/image?dir=products&id=<?=$product->id?>" width="75" height="75" alt="Image-HasTech">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a class="title" href="/shop/product-page?id=<?=$product->id?>"><?=$product->title?></a>
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
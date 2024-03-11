<?php

namespace app\repository;

use app\entity\Cart;
use app\entity\ProductToCart;

class ShopRepository
{
    public static function addToCart($cart_id, $bird_id = null, $product_id = null)
    {
        $ptc = new ProductToCart();
        $ptc->cart_id = $cart_id;
        $ptc->bird_id = $bird_id;
        $ptc->product_id = $product_id;
        $ptc->save();
    }

    public static function getCart($user_id)
    {
        $cart = Cart::find()->where(['user_id' => $user_id, 'is_paid' => false])->one();
        if (empty($cart)) {
            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->save();
        }
        return $cart;
    }
}
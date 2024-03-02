<?php

namespace app\entity;

use Yii;

/**
 * This is the model class for table "product_to_cart".
 *
 * @property int $id
 * @property int $cart_id
 * @property int|null $product_id
 * @property int|null $bird_id
 *
 * @property Birds $bird
 * @property Cart $cart
 * @property Product $product
 */
class ProductToCart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_to_cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cart_id'], 'required'],
            [['cart_id', 'product_id', 'bird_id'], 'default', 'value' => null],
            [['cart_id', 'product_id', 'bird_id'], 'integer'],
            [['bird_id'], 'exist', 'skipOnError' => true, 'targetClass' => Birds::class, 'targetAttribute' => ['bird_id' => 'id']],
            [['cart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::class, 'targetAttribute' => ['cart_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cart_id' => 'Cart ID',
            'product_id' => 'Product ID',
            'bird_id' => 'Bird ID',
        ];
    }

    /**
     * Gets query for [[Bird]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBird()
    {
        return $this->hasOne(Birds::class, ['id' => 'bird_id']);
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::class, ['id' => 'cart_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}

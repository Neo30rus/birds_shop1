<?php

namespace app\entity;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $user_id
 * @property float $total_price
 * @property bool $is_paid
 *
 * @property ProductToCart[] $productToCarts
 * @property Users $user
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'default', 'value' => null],
            [['user_id'], 'integer'],
            [['total_price'], 'number'],
            [['is_paid'], 'boolean'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'total_price' => 'Total Price',
            'is_paid' => 'Is Paid',
        ];
    }

    /**
     * Gets query for [[ProductToCarts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductToCarts()
    {
        return $this->hasMany(ProductToCart::class, ['cart_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}

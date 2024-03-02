<?php

namespace app\entity;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $type_id
 * @property float $price
 *
 * @property ProductToCart[] $productToCarts
 * @property DirProductType $type
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'type_id'], 'required'],
            [['description'], 'string'],
            [['type_id'], 'default', 'value' => null],
            [['type_id'], 'integer'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 100],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => DirProductType::class, 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'type_id' => 'Type ID',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[ProductToCarts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductToCarts()
    {
        return $this->hasMany(ProductToCart::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(DirProductType::class, ['id' => 'type_id']);
    }
}

<?php

namespace app\entity;

use Yii;

/**
 * This is the model class for table "birds".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $type_id
 * @property float $price
 * @property int $family_id
 * @property int $color_id
 *
 * @property DirColorBird $color
 * @property DirFamilyBird $family
 * @property ProductToCart[] $productToCarts
 * @property DirBirdType $type
 */
class Birds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'birds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'type_id', 'family_id', 'color_id'], 'required'],
            [['description'], 'string'],
            [['type_id', 'family_id', 'color_id'], 'default', 'value' => null],
            [['type_id', 'family_id', 'color_id'], 'integer'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 100],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => DirBirdType::class, 'targetAttribute' => ['type_id' => 'id']],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => DirColorBird::class, 'targetAttribute' => ['color_id' => 'id']],
            [['family_id'], 'exist', 'skipOnError' => true, 'targetClass' => DirFamilyBird::class, 'targetAttribute' => ['family_id' => 'id']],
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
            'family_id' => 'Family ID',
            'color_id' => 'Color ID',
        ];
    }

    /**
     * Gets query for [[Color]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(DirColorBird::class, ['id' => 'color_id']);
    }

    /**
     * Gets query for [[Family]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamily()
    {
        return $this->hasOne(DirFamilyBird::class, ['id' => 'family_id']);
    }

    /**
     * Gets query for [[ProductToCarts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductToCarts()
    {
        return $this->hasMany(ProductToCart::class, ['bird_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(DirBirdType::class, ['id' => 'type_id']);
    }
}

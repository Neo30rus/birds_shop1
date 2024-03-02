<?php

namespace app\entity;

use Yii;

/**
 * This is the model class for table "dir_bird_type".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 *
 * @property Birds[] $birds
 */
class DirBirdType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dir_bird_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * Gets query for [[Birds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBirds()
    {
        return $this->hasMany(Birds::class, ['type_id' => 'id']);
    }
}

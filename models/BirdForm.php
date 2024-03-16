<?php

namespace app\models;

class BirdForm extends \yii\base\Model
{
     public $title;
     public $description;
     public $type_id;
     public $price;
     public $family_id;
     public $color_id;
     public $image;
     public function rules()
     {
         return [
             [['title', 'image','type_id','family_id','color_id','price'],'required'],
             [['image'], 'file',  'extensions' => 'png, jpg'],
             ['description','string'],
             [['type_id','color_id','family_id'],'integer'],
             ['price','number']
         ];
     }
}
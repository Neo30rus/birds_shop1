<?php

namespace app\models;

class ProductForm extends \yii\base\Model
{
     public $title;
     public $description;
     public $type_id;
     public $price;
     public function rules()
     {
         return [
             [['title','type_id','price'],'required'],
             ['description','string'],
             ['type_id','integer'],
             ['price','number']
         ];
     }
}
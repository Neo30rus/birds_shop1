<?php

namespace app\repository;

use app\entity\Product;

class ProductRepository
{
  public static function getProducts(){
      return Product::find()->all();
  }
  public static function getProductById($id){
      return Product::find()->where(['id' => $id])->one();
  }
  public static function createProduct ($title,$type_id,$price,$description=null){
      $product = new Product();
      $product->title = $title;
      $product->description = $description;
      $product->type_id = $type_id;
      $product->price = $price;
      $product->save();
      return Product::findOne($product->id);
  }
}
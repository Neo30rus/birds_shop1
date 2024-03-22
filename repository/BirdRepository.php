<?php

namespace app\repository;

use app\entity\Birds;
use app\entity\Product;

class BirdRepository
{
  public static function getBirds(){
      return Birds::find()->all();
  }

  public static function getBirdById($id){
      return Birds::find()->where(['id' => $id])->one();
  }
  public static function createBird ($title,$type_id,$color_id,$family_id,$price,$description=null){
      $birds = new Birds();
      $birds->title = $title;
      $birds->description = $description;
      $birds->type_id = $type_id;
      $birds->color_id = $color_id;
      $birds->family_id = $family_id;
      $birds->price = $price;
      $birds->save();
      return Birds::findOne($birds->id);
  }
}
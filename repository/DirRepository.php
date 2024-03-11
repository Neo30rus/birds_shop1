<?php

namespace app\repository;

use app\entity\DirBirdType;
use app\entity\DirColorBird;
use app\entity\DirFamilyBird;
use app\entity\DirProductType;
use app\entity\Product;

class DirRepository
{
  public static function getProductsType(){
      return DirProductType::find()->all();
  }
    public static function getBirdType(){
        return DirBirdType::find()->all();
    }
    public static function getBirdColor(){
        return DirColorBird::find()->all();
    }
    public static function getBirdFamily(){
        return DirFamilyBird::find()->all();
    }
}
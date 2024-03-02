<?php

namespace app\repository;

use app\entity\DirProductType;
use app\entity\Product;

class DirRepository
{
  public static function getProductsType(){
      return DirProductType::find()->all();
  }

}
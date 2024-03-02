<?php

namespace app\controllers;

use app\models\ProductForm;
use app\repository\DirRepository;
use app\repository\ProductRepository;

class ShopController extends \yii\web\Controller
{
    public function actionProduct()
    {
        $product = ProductRepository::getProducts();
        return $this->render('product', ['products' => $product]);
    }

    public function actionCreateProduct()
    {
        $model = new ProductForm();
        if ($model->load(\Yii::$app->request->post()) and $model->validate()){
            ProductRepository::createProduct(
                $model->title,
                $model->type_id,
                $model->price,
                $model->description
            );
            return $this->redirect('/shop/product');
        }
        $typesDb= DirRepository::getProductsType();
        $types=[];
        foreach ($typesDb as $type){
             $types[$type->id]= $type->title;
        }
        return $this->render('createproduct',[
            'model'=>$model,
            'types'=>$types
        ]);
    }
}
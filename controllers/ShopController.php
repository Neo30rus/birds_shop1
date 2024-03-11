<?php

namespace app\controllers;

use app\models\BirdForm;
use app\models\ProductForm;
use app\repository\BirdRepository;
use app\repository\DirRepository;
use app\repository\ProductRepository;
use app\repository\ShopRepository;

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
    public function actionBirds()
    {
        $birds = BirdRepository::getBirds();
        return $this->render('birds', ['birds' => $birds]);
    }
    public function actionCreateBird()
    {
        $model = new BirdForm();
        if ($model->load(\Yii::$app->request->post()) and $model->validate()){
            BirdRepository::createBird(
                $model->title,
                $model->type_id,
                $model->color_id,
                $model->family_id,
                $model->price,
                $model->description
            );
            return $this->redirect('/shop/birds');
        }
        $typesDb= DirRepository::getBirdType();
        $colorDb= DirRepository::getBirdColor();
        $familyDb= DirRepository::getBirdFamily();
        $types=[];
        foreach ($typesDb as $type){
            $types[$type->id]= $type->title;
        }
        $colors=[];
        foreach ($colorDb as $color){
            $colors[$color->id]= $color->title;
        }
        $families=[];
        foreach ($familyDb as $family){
            $families[$family->id]= $family->title;
        }
        return $this->render('createbird',[
            'model'=>$model,
            'types'=>$types,
            'colors'=>$colors,
            'families'=>$families,
        ]);
    }
    public function actionAddToCart($bird_id=null,$product_id=null){
        if (isset($bird_id) xor isset($product_id)){
         $cart=ShopRepository::getCart(\Yii::$app->user->id);
         ShopRepository::addToCart($cart->id,$bird_id,$product_id);
        }
    }
}
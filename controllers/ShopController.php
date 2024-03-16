<?php

namespace app\controllers;

use app\models\BirdForm;
use app\models\ProductForm;
use app\repository\BirdRepository;
use app\repository\DirRepository;
use app\repository\ProductRepository;
use app\repository\ShopRepository;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class ShopController extends \yii\web\Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' =>['create-product','create-bird','add-to-cart','cart', 'buy-cart'],


                    'rules' => [
                        [
                            'actions'=>['create-product','create-bird'],
                            'allow' => true,
                            'roles' => ['admin']
                        ],

                        [
                            'actions'=>['add-to-cart','cart', 'buy-cart'],
                            'allow' => true,
                            'roles' => ['@']
                        ],
                    ]
                ],

            ]
        );
    }
    public function actionProduct()
    {
        $product = ProductRepository::getProducts();
        return $this->render('product', ['products' => $product]);
    }

    public function actionCreateProduct()
    {
        $model = new ProductForm();
        if ($model->load(\Yii::$app->request->post())) {
        $model->image= UploadedFile::getInstance($model,'image');
            if ($model->validate()) {
                $product= ProductRepository::createProduct(
                    $model->title,
                    $model->type_id,
                    $model->price,
                    $model->description
                );
                $alias = \Yii::getAlias('@app/upload/products');
                if (!is_dir($alias)) {
                    mkdir($alias, 777, true);
                }
                array_map("unlink",glob("$alias/{$product->id}.*"));
                $model->image->saveAs("{$alias}/{$product->id}.{$model->image->extension}");
                return $this->redirect('/shop/product');
            }
        }
        $typesDb = DirRepository::getProductsType();
        $types = [];
        foreach ($typesDb as $type) {
            $types[$type->id] = $type->title;
        }
        return $this->render('createproduct', [
            'model' => $model,
            'types' => $types
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
        if ($model->load(\Yii::$app->request->post()) ) {
            $model->image= UploadedFile::getInstance($model,'image');
            if ($model->validate()) {
                $bird = BirdRepository::createBird(
                    $model->title,
                    $model->type_id,
                    $model->color_id,
                    $model->family_id,
                    $model->price,
                    $model->description
                );
                $alias = \Yii::getAlias('@app/upload/birds');
                if (!is_dir($alias)) {
                    mkdir($alias, 777, true);
                }
                array_map("unlink", glob("$alias/{$bird->id}.*"));
                $model->image->saveAs("{$alias}/{$bird->id}.{$model->image->extension}");
                return $this->redirect('/shop/birds');
            }
        }
        $typesDb = DirRepository::getBirdType();
        $colorDb = DirRepository::getBirdColor();
        $familyDb = DirRepository::getBirdFamily();
        $types = [];
        foreach ($typesDb as $type) {
            $types[$type->id] = $type->title;
        }
        $colors = [];
        foreach ($colorDb as $color) {
            $colors[$color->id] = $color->title;
        }
        $families = [];
        foreach ($familyDb as $family) {
            $families[$family->id] = $family->title;
        }
        return $this->render('createbird', [
            'model' => $model,
            'types' => $types,
            'colors' => $colors,
            'families' => $families,
        ]);
    }

    public function actionAddToCart($bird_id = null, $product_id = null)
    {
        if (isset($bird_id) xor isset($product_id)) {
            $cart = ShopRepository::getCart(\Yii::$app->user->id);
            ShopRepository::addToCart($cart->id, $bird_id, $product_id);
        }
        return $this->redirect('/shop/cart');
    }

    public function actionCart()
    {
        $cart = ShopRepository::getCart(\Yii::$app->user->id);
        return $this->render('cart', ['cart' => $cart]);
    }

    public function actionBuyCart()
    {
        $user_id = \Yii::$app->user->id;
        $cart = ShopRepository::getCart($user_id);
        ShopRepository::buyCart($cart->id);
    }
    public function actionImage($dir,$id){
        $alias = \Yii::getAlias("@app/upload/{$dir}/{$id}");
        $path = glob("$alias.*")[0];
        $file = file_get_contents($path);
        $temp = explode('/',$path);
        $filename = $temp[count($temp)-1];
        \Yii::$app->response->sendContentAsFile($file, $filename, [
            'inline' => true,
            'mimeType' => mime_content_type($path)
        ]);
    }
}
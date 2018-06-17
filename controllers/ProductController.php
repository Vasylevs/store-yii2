<?php

namespace app\controllers;


use app\models\Product;
use app\models\Category;

class ProductController extends AppController
{
    public function actionView($id){
        $product = Product::findOne($id);
        $category = Category::find()->where(['id' => "{$product->category_id}"])->limit(1)->one();
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER | ' . $product['name'], $product->keywords, $product->description);
        return $this->render('view', compact('product', 'category', 'hits'));
    }
}
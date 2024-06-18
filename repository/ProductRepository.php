<?php

namespace app\repository;
use app\entity\Categories;
use app\entity\Products;

class ProductRepository
{
    public static function getAll()
    {
        return Products::find()->all();
    }

    public static function createNewProducts($title, $description, $price, $quantity, $category_id)
    {
        $products = new Products();
        $products->title = $title;
        $products->description = $description;
        $products->price = $price;
        $products->quantity = $quantity;
        $products->category_id = $category_id;



        $products->save();
        return $products->id;
    }

}
<?php

namespace app\repository;
use app\entity\Categories;
class CategoryRepository
{

    public static function getCategory($where = [], $orderBy = null)
    {
        return Categories::find()->where($where)->orderBy($orderBy)->all();
    }
    public static function getOneFromCategories($where = [])
    {
        return Categories::find()->where($where)->one();
    }

    public static function createNewCategory($title, $description, $img)
    {
        $category = new Categories();
        $category->title = $title;
        $category->description = $description;
        $category->img = $img;
        $category->save();
        return $category->id;
    }
}
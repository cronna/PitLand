<?php

namespace app\models;
namespace app\controllers;
use app\entity\Categories;
use app\entity\Products;
use yii\base\Model;
use Yii;

class ProductsModel extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'quantity', 'category_id'], 'required'],
            [['description'], 'string'],
            [['price', 'quantity', 'category_id'], 'default', 'value' => null],
            [['price', 'quantity', 'category_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsByCategoryId($id)
    {
        return $this->hasMany(Products::class, ['id'=>'category_id']);
    }
}
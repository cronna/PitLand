<?php

namespace app\entity;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $price
 * @property int $quantity
 * @property int $category_id
 *
 * @property Basket[] $baskets
 * @property Categories $category
 */
class Products extends \yii\db\ActiveRecord
{

}

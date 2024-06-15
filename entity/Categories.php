<?php

namespace app\entity;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 *
 * @property Menu[] $menus
 */
class Categories extends \yii\db\ActiveRecord
{
    public function getMenus()
    {
        return $this->hasMany(Menu::class, ['category_id' => 'id']);
    }
}

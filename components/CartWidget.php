<?php

namespace app\components;

use Yii;
use yii\base\Widget;

class CartWidget extends Widget
{
    public function run()
    {
        echo "<a href='#'>"
            . "<svg width='24' height='24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M18.5 2.5h-13L3.747 18.28a2 2 0 0 0 1.988 2.22h12.53a2 2 0 0 0 1.988-2.22L18.5 2.5z' stroke='#000'></path><path d='M15.5 9a3.5 3.5 0 1 1-7 0m0-2V5m7 2V5' stroke='#000'></path></svg>"
//            . "<span>Корзина</span>"
            . "</a>";
    }
}
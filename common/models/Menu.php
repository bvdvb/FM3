<?php

namespace common\models;

use common\models\generated\Menu as GeneratedMenu;
use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent
 * @property string|null $route
 * @property int|null $order
 * @property resource|null $data
 *
 * @property Menu[] $menus
 * @property Menu $parent0
 */
class Menu extends GeneratedMenu
{
   
}

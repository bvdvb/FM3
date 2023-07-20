<?php

namespace common\models;

use common\models\generated\AuthAssignment as GeneratedAuthAssignment;
use Yii;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int|null $created_at
 *
 * @property AuthItem $itemName
 */
class AuthAssignment extends GeneratedAuthAssignment
{
    
}

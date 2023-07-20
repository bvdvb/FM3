<?php

namespace common\models;

use common\models\generated\Type as GeneratedType;
use Yii;

/**
 * This is the model class for table "type".
 *
 * @property int $id
 * @property string|null $type
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Kruistypemerktoestel[] $kruistypemerktoestels
 * @property User $updatedByUser
 */
class Type extends GeneratedType
{
   
}

<?php

namespace common\models;

use common\models\generated\Merk as GeneratedMerk;
use Yii;

/**
 * This is the model class for table "merk".
 *
 * @property int $id
 * @property string|null $merknaam
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Kruistypemerktoestel[] $kruistypemerktoestels
 * @property Reservetoestel[] $reservetoestels
 * @property User $updatedByUser
 */
class Merk extends GeneratedMerk
{
  
}

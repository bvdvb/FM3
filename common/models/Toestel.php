<?php

namespace common\models;

use common\models\generated\Toestel as GeneratedToestel;
use Yii;

/**
 * This is the model class for table "toestel".
 *
 * @property int $id
 * @property string|null $toestelnaam
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
class Toestel extends GeneratedToestel
{
 
}

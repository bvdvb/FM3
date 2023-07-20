<?php

namespace common\models;

use common\models\generated\Verlof as GeneratedVerlof;
use Yii;

/**
 * This is the model class for table "verlof".
 *
 * @property int $id
 * @property int|null $verlofwie
 * @property string|null $verlofstart
 * @property string|null $verlofeind
 * @property int|null $verlofgoedkeuring_userid
 * @property int|null $verlofgoedkeuring
 * @property string|null $verlofextrainfo
 * @property string|null $verlofextrainforeply
 * @property int $created_by_userid
 * @property string|null $created_at
 * @property int $updated_by_userid
 * @property string|null $updated_at
 *
 * @property User $createdByUser
 * @property User $updatedByUser
 * @property User $verlofgoedkeuringUser
 */
class Verlof extends GeneratedVerlof
{
   
}

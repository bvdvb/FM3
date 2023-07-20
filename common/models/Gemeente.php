<?php

namespace common\models;

use common\models\generated\Gemeente as GeneratedGemeente;
use Yii;

/**
 * This is the model class for table "gemeente".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $naam
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Klant[] $klants
 * @property User $updatedByUser
 */
class Gemeente extends GeneratedGemeente
{
   
}

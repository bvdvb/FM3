<?php
namespace common\models;

use common\models\generated\Reparatie as GeneratedReparatie;
use Yii;

/**
 * This is the model class for table "reparatie".
 *
 * @property int $id
 * @property string|null $reparatienaam
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property User $updatedByUser
 */
class Reparatie extends GeneratedReparatie
{
   
}

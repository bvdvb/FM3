<?php

namespace common\models;

use common\models\generated\Kruistypemerktoestel as GeneratedKruistypemerktoestel;
use Yii;

/**
 * This is the model class for table "kruistypemerktoestel".
 *
 * @property int $id
 * @property int $kruistypeid
 * @property int $kruismerkid
 * @property int $kruisttoestelid
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Herstelling[] $herstellings
 * @property Merk $kruismerk
 * @property Toestel $kruisttoestel
 * @property Type $kruistype
 * @property User $updatedByUser
 */
class Kruistypemerktoestel extends GeneratedKruistypemerktoestel
{
  
}

<?php

namespace common\models;

use common\models\generated\Bestelling as GeneratedBestelling;
use Yii;

/**
 * This is the model class for table "bestelling".
 *
 * @property int $id
 * @property string|null $besteltekst
 * @property int|null $bestelstatus
 * @property string|null $bestelinvoegdate
 * @property string|null $bestelbesteldate
 * @property string|null $bestelafleverdate
 * @property int|null $besteluser
 * @property int|null $herstellingid
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Herstelling $herstelling
 * @property User $updatedByUser
 */
class Bestelling extends GeneratedBestelling
{
   
}

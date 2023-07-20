<?php

namespace common\models;

use common\models\generated\Log as GeneratedLog;
use Yii;

/**
 * This is the model class for table "log".
 *
 * @property int $idgesch
 * @property string|null $geschwhatend from what side of the application Backend/frontend
 * @property string|null $geschcontroller
 * @property string|null $geschaction
 * @property string|null $geschkortomschrijving
 * @property int|null $geschalerttype 0--> error 1-> succes 
 * @property string|null $geschextratekst
 * @property string|null $geschparams
 * @property string|null $geschrelatedkeys
 * @property int|null $created_by_userid
 * @property string|null $created_at
 * @property int|null $updated_by_userid
 * @property string|null $updated_at
 * @property int|null $geschiedenisherstelid
 *
 * @property User $createdByUser
 * @property Herstelling $geschiedenisherstel
 * @property User $updatedByUser
 */
class Log extends GeneratedLog
{
  
}

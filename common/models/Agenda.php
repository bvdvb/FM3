<?php

namespace common\models;

use common\models\generated\Agenda as GeneratedAgenda;
use Yii;

/**
 * This is the model class for table "agenda".
 *
 * @property int $id
 * @property string $agendaeventdatefrom
 * @property string $agendaeventdateto
 * @property string|null $agendaopm
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property Agendauserkruis[] $agendauserkruis
 * @property User $createdByUser
 * @property User $updatedByUser
 */
class Agenda extends GeneratedAgenda
{
 
}

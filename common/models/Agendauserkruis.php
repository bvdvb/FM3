<?php

namespace common\models;

use common\models\generated\Agendauserkruis as GeneratedAgendauserkruis;
use Yii;

/**
 * This is the model class for table "agendauserkruis".
 *
 * @property int $id
 * @property int $agendaid
 * @property int $agendauserid
 * @property int|null $herstelid
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property Agenda $agenda
 * @property User $agendauser
 * @property User $createdByUser
 * @property Herstelling $herstel
 * @property User $updatedByUser
 */
class Agendauserkruis extends GeneratedAgendauserkruis
{
 
}

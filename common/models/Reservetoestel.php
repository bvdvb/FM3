<?php

namespace common\models;

use common\models\generated\Reservetoestel as GeneratedReservetoestel;
use Yii;

/**
 * This is the model class for table "reservetoestel".
 *
 * @property int $id
 * @property int|null $reservetoestelmerk
 * @property int $reservetoesteltype
 * @property string|null $reservetoestelnummer
 * @property string|null $reservetoestelomschrijving
 * @property int|null $reserveuitleenaan
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Herstelling[] $herstellings
 * @property Merk $reservetoestelmerk0
 * @property Toestel $reservetoesteltype0
 * @property Klant $reserveuitleenaan0
 * @property User $updatedByUser
 */
class Reservetoestel extends GeneratedReservetoestel
{
   
}

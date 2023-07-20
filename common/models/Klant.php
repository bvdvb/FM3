<?php

namespace common\models;

use common\models\generated\Klant as GeneratedKlant;
use Yii;

/**
 * This is the model class for table "klant".
 *
 * @property int $klantid
 * @property string|null $klantnaam
 * @property string|null $straat
 * @property string|null $nr
 * @property int|null $gemeenid
 * @property string|null $email
 * @property string|null $tel
 * @property string|null $klantopmerkingen
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Gemeente $gemeen
 * @property Herstelling[] $herstellings
 * @property Reservetoestel[] $reservetoestels
 * @property User $updatedByUser
 */
class Klant extends GeneratedKlant
{
  
}
